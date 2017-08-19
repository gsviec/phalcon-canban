<?php
/**
 * Get config service for use in inline setup below
 */
$config = $di->getConfig();
$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
    [
        'App\Controllers'   => APP_PATH .'/controllers/',
        'App\Models'        => APP_PATH .'/models/',
        'App\Auth'          => APP_PATH .'/library/Auth',
        'App\Forms'         => APP_PATH .'/forms',
        'App\Mail'          => APP_PATH .'/library/Mail',
        'App\Queue'         => APP_PATH .'/library/Queue',

    ]
);
$loader->registerFiles(
        [
            APP_PATH . '/library/helper.php',
            APP_PATH . '/library/PhpFunctionExtension.php',
        ]
);


$loader->register();

// Register The Composer Auto Loader
require_once BASE_PATH . '/vendor/autoload.php';

