<?php
namespace App\Forms;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Mvc\Model\Validator\StringLength;
use Phalcon\Validation\Validator\PresenceOf;

class PostsForm extends \Phalcon\Forms\Form
{
    public function initialize($object = null)
    {
        if ($object) {
            $this->add(new Hidden('id'));
        }
        $title = new \Phalcon\Forms\Element\Text('title', [
           'class' => 'form-control',
            'placeholder' => 'Add title'
        ]);
        $title->addValidator(
          new PresenceOf(['message' => 'This is field required'])
        );
        $title->addValidator(new \Phalcon\Validation\Validator\StringLength([
            'min' => 10,
            "messageMinimum" => "The name is too short"
        ]));
        $this->add($title);

        $content = new \Phalcon\Forms\Element\TextArea('content', [
           'class' => 'form-control',
            'rows' => '4',
            'placeholder' => 'Adding content'
        ]);
        $this->add($content);
    }
}