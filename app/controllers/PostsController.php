<?php
namespace App\Controllers;

use App\Forms\PostsForm;
use App\Models\Posts;

class PostsController extends ControllerBase
{

    public function indexAction()
    {
        $posts = Posts::find();
        $this->view->posts = $posts;
    }

    public function newAction()
    {
        $this->view->form = new PostsForm();
    }

    public function editAction($id)
    {
        $post = Posts::findFirstById($id);

        if (!$post) {
            return $this->response->redirect();
        }
        $this->view->post = $post;
        $this->view->form = new PostsForm($post);
        $this->view->pick('posts/new');
    }
    public function deletedAction($id)
    {
        $post = Posts::findFirst($id);

        if (!$post) {
            $this->flashSession->notice('The post not found!');
            return $this->response->redirect('posts');
        }

        if (!$post->delete()) {
            $this->flashSession->notice('The post can  not deleted!');
            return $this->response->redirect('posts');
        }
        $this->flashSession->success('The posts deleted was success!');
        return $this->response->redirect('posts');
    }
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->response->redirect();
        }
        $id = $_POST['id'];
        if (isset($id)) {
            $post = Posts::findFirstById($id);
        } else {
            $post = new Posts();
        }
        $post->setUserId(1);
        $post->setCreated(time());

        $postForm = new PostsForm();
        $postForm->bind($this->request->getPost(), $post);
        if (!$postForm->isValid()) {
            foreach ($postForm->getMessages() as $m) {
                $this->flashSession->error($m->getMessage());
                if (isset($id)) {
                    return $this->dispatcher->forward([
                        'controller' => $this->router->getControllerName(),
                        'action' => 'edit',
                        'params' => ['id' => $id]
                    ]);
                } else {
                    return $this->dispatcher->forward([
                        'controller' => $this->router->getControllerName(),
                        'action' => 'new'
                    ]);
                }

            }
        }
        if (!$post->save()) {
            foreach ($post->getMessages() as $message) {
                $this->flashSession->error($message->getMessage());
                return $this->response->redirect('posts');
            }
        }

        $this->flashSession->success('Adding data success!');

        return $this->response->redirect('posts');
    }
}

