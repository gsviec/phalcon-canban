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
        'App\Controllers'   => $config->application->controllersDir,
        'App\Models'        => $config->application->modelsDir,
        'App\Auth'          => APP_PATH .'/library/Auth'
    ]
);
$loader->registerFiles(
        [
            APP_PATH . '/library/helper.php'
        ]
);


$loader->register();
