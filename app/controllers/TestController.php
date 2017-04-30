<?php
namespace App\Controllers;

use App\Auth\Token;

class TestController extends ControllerBase
{

    public function indexAction()
    {
        $auth = $this->auth;

        ///$this->getDI()->get('auth');
        d($auth);
    }
    public function showAction()
    {
        d('show');
    }
}

