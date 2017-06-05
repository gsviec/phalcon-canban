<?php
namespace App\Controllers;

use App\Auth\Token;
use App\Models\Posts;
use Phalcon\Mvc\Model\Resultset\Simple;

class TestController extends ControllerBase
{

    public function initialize()
    {
        $this->view->name = 'Phalcon PHP';
    }
    public function indexAction()
    {
        $post = new Posts();

        // A raw SQL statement
        $sql = "SELECT * FROM posts WHERE id > 0";

        // Base model

        // Execute the query
        $data = new Simple(
            null,
            $post,
            $post->getReadConnection()->query($sql)
        );
        foreach ($data as $d) {
            d($d);
        }
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

    public function voltAction()
    {
        $this->view->frameworks = ['PhalconPHP', 'Laravel' ,'Zend'];
    }

    public function viewAction()
    {

    }

}

