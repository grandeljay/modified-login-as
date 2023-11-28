<?php

/**
 * German translations
 *
 * @author  Jay Trees <login-as@grandels.email>
 * @link    https://github.com/grandeljay/modified-login-as
 * @package GrandelJayLoginAs
 */

namespace Grandeljay\LoginAs;

$translations_general = array(
    /**
     * Module
     */
    'TITLE'             => 'grandeljay - Registrarse como',
    'LONG_DESCRIPTION'  => 'Le permite iniciar sesión como cliente.',
    'STATUS_TITLE'      => '¿Activar módulo?',
    'STATUS_DESC'       => 'Le permite iniciar sesión como cliente.',
    'TEXT_TITLE'        => 'Registrarse como',

    'LOGIN_AS_CUSTOMER' => 'Registrarse como cliente',
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
