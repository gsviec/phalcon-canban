<?php
namespace App\Controllers;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function newAction()
    {
        $this->view->productTypes = ['PHP', 'JAVA' ,' Ruby'];
    }
}

