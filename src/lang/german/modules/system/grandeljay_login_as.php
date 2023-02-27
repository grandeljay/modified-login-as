<?php

/**
 * Login as
 *
 * @author  Jay Trees <login-as@grandels.email>
 * @link    https://github.com/grandeljay/modified-login-as
 * @package GrandelJayLoginAs
 */

namespace Grandeljay\Loginas;

$translations_general = array(
    /**
     * Module
     */
    'TITLE'             => 'grandeljay - Login as',
    'LONG_DESCRIPTION'  => 'Allows you to login as a customer.',
    'STATUS_TITLE'      => 'Modul aktivieren?',
    'STATUS_DESC'       => 'Allows you to login as a customer.',
    'TEXT_TITLE'        => 'Login as',

    'LOGIN_AS_CUSTOMER' => 'Als Kunde anmelden',
);

/**
 * Define
 */
$translations = array_merge(
    $translations_general,
);

foreach ($translations as $key => $value) {
    $constant = 'MODULE_' . strtoupper(pathinfo(__FILE__, PATHINFO_FILENAME)) . '_' . $key;

    define($constant, $value);
}
