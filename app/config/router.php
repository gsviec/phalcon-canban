<?php

$router = $di->getRouter();

// Define your routes here
$router->add('/abc', ['controller' => 'test', 'action' => 'show']);
$router->handle();
