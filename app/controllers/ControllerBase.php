<?php
namespace App\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->view->name = 'Gsviec.com';
    }
}
