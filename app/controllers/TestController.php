<?php
namespace App\Controllers;

use App\Auth\Token;

class TestController extends ControllerBase
{

    public function initialize()
    {
        $this->view->name = 'Thien Tran';
    }
    public function indexAction()
    {
        $auth = $this->auth;

        ///$this->getDI()->get('auth');
        d($auth);
    }
    public function showAction($slug = 'demo')
    {
        $this->view->slug = $slug;
        //$this->view->pick('test/pick');
    }
    public function requestAction()
    {
        //return $this->response->redirect('http://gsviec.com');

        $this->response->setJsonContent([
            'framework' => 'PhalconPHP',
            'versions' =>[
                '1.3.2',
                '1.3.3',
                '3.x.0'
            ]
        ]);
        // We send the output to the client
        return $this->response->send();
    }
    public function abcAction()
    {
        d(1);
    }
}

