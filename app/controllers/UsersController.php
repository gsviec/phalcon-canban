<?php
namespace App\Controllers;

use App\Forms\PostsForm;
use App\Forms\UserForm;
use App\Mail\Mail;
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
                return false;
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
                return false;
            }
        }

        //Send mail

        $this->flashSession->success('Adding user success!');
        return $this->response->redirect();
    }
    public function resetpasswordAction()
    {
        if ($this->request->isPost()) {
            $mail = new Mail();
            $email = $_POST['email'];
            $user = Users::findFirstByEmail($email);
            if (!$user) {
                $this->flashSession->error('User have not found');

                return $this->response->redirect();
            }
            $params = [
                'link' => 'https://abc.com/hash',
                'name' => $user->getName()
            ];

            if (!$mail->send($email, 'reset', $params)) {
                $this->flashSession->error('Something wrong');
                return 0;
            }
            $this->flashSession->success('A email send to !');
            return $this->response->redirect();
        }
    }
}

