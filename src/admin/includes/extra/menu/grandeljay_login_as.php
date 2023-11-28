<?php

/**
 * Login as
 *
 * @author  Jay Trees <login-as@grandels.email>
 * @link    https://github.com/grandeljay/modified-login-as
 * @package GrandelJayLoginAs
 */

namespace Grandeljay\LoginAs;

if (\rth_is_module_disabled('MODULE_GRANDELJAY_LOGIN_AS')) {
    return;
}

$filename          = FILENAME_GRANDELJAY_LOGIN_AS;
$admin_access_name = pathinfo($filename, PATHINFO_FILENAME);

require DIR_FS_LANGUAGES . $_SESSION['language'] . '/modules/system/grandeljay_login_as.php';

$add_contents[BOX_HEADING_CUSTOMERS][] = array(
    'admin_access_name' => $admin_access_name,
    'filename'          => $filename,
    'boxname'           => MODULE_GRANDELJAY_LOGIN_AS_LOGIN_AS_CUSTOMER,
    'parameters'        => '',
    'ssl'               => 'SSL',
);
