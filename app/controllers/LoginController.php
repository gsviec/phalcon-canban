<?php
namespace App\Controllers;

class LoginController extends ControllerBase
{

    public function indexAction()
    {
        //get a user in database

        $user = [
            'username' => 'gsviec',
            'fullname' => 'Thien Tran',
            'email' => 'fcduythien@gmail.com'
        ];

        $this->session->set('auth', $user);
        return $this->response->redirect();
    }
}

