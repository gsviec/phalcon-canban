<?php
namespace App\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $this->session->destroy('auth');
        $a = 1;
        //d($this->session->get('auth'));
    }

    public function newAction()
    {
        $this->view->productTypes = ['PHP', 'JAVA' ,' Ruby'];
    }

    public function saveAction()
    {
        //Do some thing

        $this->flashSession->error('The posts created fails');
        return $this->response->redirect();
    }
}

