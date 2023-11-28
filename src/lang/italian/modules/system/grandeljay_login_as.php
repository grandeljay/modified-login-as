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
    'TITLE'             => 'grandeljay - Si registri come',
    'LONG_DESCRIPTION'  => 'Le permette di accedere come cliente.',
    'STATUS_TITLE'      => 'Attivare il modulo?',
    'STATUS_DESC'       => 'Le permette di accedere come cliente.',
    'TEXT_TITLE'        => 'Si registri come',

    'LOGIN_AS_CUSTOMER' => 'Si registri come cliente',
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
