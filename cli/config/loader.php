<?php
use Phalcon\Loader;

require 'constants.php';
(new Loader)
    ->registerNamespaces([
        'App\Models'        => ROOT_DIR .'/app/modles/',
        'App\Auth'          => ROOT_DIR .'/app/library/Auth',
        'App\Mail'          => ROOT_DIR .'/app/library/Mail',
        'App\Queue'         => ROOT_DIR .'/app/library/Queue',

    ])
    ->registerDirs([
        ROOT_DIR . '/cli/tasks'
    ])
    ->register();

// Register The Composer Auto Loader
require_once ROOT_DIR . '/vendor/autoload.php';
