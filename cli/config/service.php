<?php
use Phalcon\Security;
use Phalcon\Http\Response\Cookies;
use Phalcon\Cache\Frontend\Data;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Cache\Backend\Memcache;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
/**
 * Register the configuration itself as a service
 */
$config = include ROOT_DIR . '/app/config/config.php';

 if (file_exists(ROOT_DIR . '/app/config/config.' . APPLICATION_ENV . '.php')) {
     $overrideConfig = include ROOT_DIR . '/app/config/config.' . APPLICATION_ENV . '.php';
     $config->merge($overrideConfig);
 }

$di->set('config', $config, true);

// Database connection is created based in the parameters defined in the configuration file
$di->set(
    'db',
    function () use ($di) {
        return new Mysql(
            [
                'host'     => $di->get('config')->database->mysql->host,
                'username' => $di->get('config')->database->mysql->username,
                'password' => $di->get('config')->database->mysql->password,
                'dbname'   => $di->get('config')->database->mysql->dbname,
                'options'  => [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' . $di->get('config')->database->mysql->charset
                ]
            ]
        );
    },
    true // shared
);


$di->set(
    'cookies',
    function () {
        $cookies = new Cookies();
        $cookies->useEncryption(false);
        return $cookies;
    },
    true
);

$di->set(
    'security',
    function () {

        $security = new Security();
        //Set the password hashing factor to 12 rounds
        $security->setWorkFactor(12);

        return $security;
    },
    true
);

//Set the models cache service
$di->set(
    'modelsCache',
    function () {

        //Cache data for one day by default
        $frontCache = new Data(
            array(
            "lifetime" => 86400
            )
        );

        //Memcached connection settings
        $cache = new Memcache(
            $frontCache,
            array(
            "host" => "localhost",
            "port" => "11211"
            )
        );

        return $cache;
    }
);

$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new \Phalcon\Mvc\View();
    $view->setDI($this);
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines([
        '.volt' => function ($view) {
            $config = $this->getConfig();

            $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $this);

            $compile = false;
            if (APPLICATION_ENV == 'local') {
                $compile = true;
            }
            $volt->setOptions([
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_',
                'compileAlways' => $compile
            ]);
            return $volt;
        },
        '.phtml' => PhpEngine::class

    ]);

    return $view;
});
$di->setShared(/**
 * @return \App\Queue\Resque
 */
    'queue', function () {
    return new \App\Queue\Resque();
});

$di->setShared('mail', function () {
    return new App\Mail\Mail();
});

