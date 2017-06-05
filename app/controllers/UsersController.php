<?php
namespace App\Controllers;

use App\Forms\PostsForm;
use App\Forms\UserForm;
use App\Models\Posts;
use App\Models\Users;

class UsersController extends ControllerBase
{

    public function signupAction()
    {
        $this->view->form = new UserForm();
    }

    public function saveAction()
    {
        $form = new UserForm();
        $user = new Users();

        $form->bind($_POST, $user);
        if (!$form->isValid()) {
            foreach ($form->getMessages() as $m) {
                $this->flashSession->error($m->getMessage());
                $this->dispatcher->forward([
                    'controller' => $this->router->getControllerName(),
                    'action' => 'signup',
                ]);
                return;
            }
        }
        $user->setPassword($this->security->hash($_POST['password']));

        if (!$user->save()) {
            foreach ($user->getMessages() as $m) {
                $this->flashSession->error($m->getMessage());
                $this->dispatcher->forward([
                    'controller' => $this->router->getControllerName(),
                    'action' => 'signup',
                ]);
                return;
            }
        }

        //Send mail
        
        $this->flashSession->success('Adding user success!');
        return $this->response->redirect();
    }

}

