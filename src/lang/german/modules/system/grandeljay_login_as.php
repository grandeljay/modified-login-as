<?php

/**
 * German translations
 *
 * @author  Jay Trees <login-as@grandels.email>
 * @link    https://github.com/grandeljay/modified-login-as
 * @package GrandelJayLoginAs
 */

namespace Grandeljay\LoginAs;

$translations_general = [
    /**
     * Module
     */
    'TITLE'             => 'grandeljay - Anmelden als',
    'LONG_DESCRIPTION'  => 'Ermöglicht es Ihnen, sich als Kunde anzumelden.',
    'STATUS_TITLE'      => 'Modul aktivieren?',
    'STATUS_DESC'       => 'Ermöglicht es Ihnen, sich als Kunde anzumelden.',
    'TEXT_TITLE'        => 'Anmelden als',

    'LOGIN_AS_CUSTOMER' => 'Als Kunde anmelden',
];

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
