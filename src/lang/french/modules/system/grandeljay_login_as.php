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
    'TITLE'             => 'grandeljay - Se connecter en tant que',
    'LONG_DESCRIPTION'  => 'Vous permet de vous connecter en tant que client.',
    'STATUS_TITLE'      => 'Activer le module ?',
    'STATUS_DESC'       => 'Vous permet de vous connecter en tant que client.',
    'TEXT_TITLE'        => 'S\'inscrire en tant que',

    'LOGIN_AS_CUSTOMER' => 'S\'inscrire comme client',
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
