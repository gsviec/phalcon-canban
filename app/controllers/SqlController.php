<?php
namespace App\Controllers;

use App\Models\Posts;
use Phalcon\Mvc\Model\Resultset\Simple;

class SqlController extends ControllerBase
{
    public function indexAction()
    {
        $db = $this->db;
        //$this->getDI()->get('db')
        $sql = "SELECT * FROM posts";
        //$result = $db->fetchAll($sql);

//        $r = $db->insert(
//          'posts',
//          ['Khoa hoc Phalcon', 'Day la content', time(), 2],
//          ['title', 'content', 'created', 'user_id']
//        );
        $post = new Posts();

        $result = new Simple(
            null,
            $post,
            $post->getReadConnection()->query($sql)
        );

        d($result[0]->getTitle());
    }

    public function phqlAction()
    {
        $sql = "SELECT * FROM \App\Models\Posts as p WHERE p.id =:id:";
        $r = $this->modelsManager->executeQuery($sql, ['id' => 1]);
        d($r->getFirst()->getTitle());

        foreach ($r as $data) {
            echo $data->getTitle() ."<br>";
        }
    }

}

