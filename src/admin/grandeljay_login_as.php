<?php

/**
 * Login as
 *
 * @author  Jay Trees <login-as@grandels.email>
 * @link    https://github.com/grandeljay/modified-login-as
 * @package GrandelJayLoginAs
 */

namespace Grandeljay\LoginAs;

require 'includes/application_top.php';

if ('POST' === $_SERVER['REQUEST_METHOD'] && isset($_POST['customers_id'])) {
    /**
     * Log on
     */
    if (\SESSION_RECREATE == 'True') {
        \xtc_session_recreate();
    }

    $_SESSION['customer_id']   = $_POST['customers_id'];
    $_SESSION['customer_time'] = time();

    xtc_db_query(
        "UPDATE " . TABLE_CUSTOMERS . "
                SET customers_password_time = '" . (int)$_SESSION['customer_time'] . "'
            WHERE customers_id = '" . (int)$_SESSION['customer_id'] . "' "
    );

    xtc_db_query(
        "UPDATE " . TABLE_CUSTOMERS_INFO . "
                     SET customers_info_date_of_last_logon = now(),
                         customers_info_number_of_logons = customers_info_number_of_logons+1
                   WHERE customers_info_id = '" . (int)$_SESSION['customer_id'] . "'"
    );

    require \DIR_FS_CATALOG . \DIR_WS_INCLUDES . 'write_customers_status.php';
    require \DIR_FS_CATALOG . 'inc/write_customers_session.inc.php';
    require \DIR_FS_CATALOG . 'inc/xtc_write_user_info.inc.php';

    \write_customers_session($_SESSION['customer_id']);
    \xtc_write_user_info($_SESSION['customer_id']);

    $_SESSION['cart']->restore_contents();

    foreach (\auto_include(DIR_FS_CATALOG . 'includes/extra/login/', 'php') as $file) {
        require $file;
    }
}

require \DIR_FS_LANGUAGES . $_SESSION['language'] . '/admin/customers.php';
require \DIR_WS_INCLUDES . 'head.php';
?>
</head>

<body>
    <?php
    require \DIR_WS_INCLUDES . 'header.php';

    if ('POST' !== $_SERVER['REQUEST_METHOD']) {
        $customers_query = xtc_db_query(
            sprintf('SELECT * FROM `%s`', \TABLE_CUSTOMERS)
        );
        ?>

        <table class="tableBoxCenter collapse">
            <thead>
                <tr class="dataTableHeadingRow">
                    <th class="dataTableHeadingContent"><?= \TABLE_HEADING_ACCOUNT_TYPE ?></th>
                    <th class="dataTableHeadingContent"><?= \TABLE_HEADING_CUSTOMERSCID ?></th>
                    <th class="dataTableHeadingContent"><?= \TABLE_HEADING_LASTNAME ?></th>
                    <th class="dataTableHeadingContent"><?= \TABLE_HEADING_FIRSTNAME ?></th>
                    <th class="dataTableHeadingContent"><?= \TABLE_HEADING_EMAIL ?></th>
                    <th class="dataTableHeadingContent"><?= \TABLE_HEADING_COUNTRY_NAME ?></th>
                    <th class="dataTableHeadingContent"><?= \TABLE_HEADING_UMSATZ ?></th>
                    <th class="dataTableHeadingContent"><?= \HEADING_TITLE_STATUS ?></th>
                    <th class="dataTableHeadingContent"><?= \HEADING_TITLE_VAT ?></th>
                    <th class="dataTableHeadingContent"><?= \TABLE_HEADING_AMOUNT ?></th>
                    <th class="dataTableHeadingContent"><?= \TABLE_HEADING_ACCOUNT_CREATED ?></th>
                    <th class="dataTableHeadingContent"><?= \TABLE_HEADING_ACTION ?></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($customer = xtc_db_fetch_array($customers_query)) { ?>
                    <tr class="dataTableRow">
                        <td class="dataTableContent"></td>
                        <td class="dataTableContent"><?= $customer['customers_cid']; ?></td>
                        <td class="dataTableContent"><?= $customer['customers_lastname']; ?></td>
                        <td class="dataTableContent"><?= $customer['customers_firstname']; ?></td>
                        <td class="dataTableContent"><?= $customer['customers_email_address']; ?></td>
                        <td class="dataTableContent"><?= xtc_get_country_name($customer['entry_country_id'] ?? ''); ?></td>
                        <td class="dataTableContent">---</td>
                        <td class="dataTableContent"></td>
                        <td class="dataTableContent"></td>
                        <td class="dataTableContent"></td>
                        <td class="dataTableContent txta-r"><?= xtc_date_short($customer['date_account_created'] ?? ''); ?></td>
                        <td class="dataTableContent txta-r">
                            <form method="POST">
                                <input type="hidden" name="customers_id" value="<?= $customer['customers_id']; ?>" />

                                <input type="submit" value="<?= MODULE_GRANDELJAY_LOGIN_AS_LOGIN_AS_CUSTOMER ?>" />
                            </form>
                        </td>
                    </tr>
                <?php } ?>

                <tr>
                    <td>
                    <!-- PAGINATION-->
                    <div class="smallText pdg2 flt-l"><?php echo $customers_split->display_count($customers_query_numrows, $page_max_display_results, $page, TEXT_DISPLAY_NUMBER_OF_CUSTOMERS); ?></div>
                    <div class="smallText pdg2 flt-r"><?php echo $customers_split->display_links($customers_query_numrows, $page_max_display_results, \MAX_DISPLAY_PAGE_LINKS, $page, xtc_get_all_get_params(array('page', 'info', 'x', 'y', 'cID'))); ?></div>
                    <?php echo draw_input_per_page($PHP_SELF, $cfg_max_display_results_key, $page_max_display_results); ?>
                    <?php
                    if (isset($_GET['search'])) {
                        ?>
                        <div class="clear"></div>
                        <div class="smallText pdg2 flt-r"><?php echo '<a class="button" onclick="this.blur();" href="' . xtc_href_link(\FILENAME_CUSTOMERS) . '">' . BUTTON_RESET . '</a>'; ?></div>
                        <?php
                    }
                    ?>
                    </td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <?php
    }

    require \DIR_WS_INCLUDES . 'footer.php';
    ?>
</body>
</html>

<?php require \DIR_WS_INCLUDES . 'application_bottom.php'; ?>
