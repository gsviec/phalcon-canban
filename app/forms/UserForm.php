<?php
namespace App\Forms;

use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Text;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\StringLength;

class UserForm extends \Phalcon\Forms\Form
{
    public function initialize($object = null)
    {
        if ($object) {
            $this->add(new Hidden('id'));
        }

        $name = new Text('name', [
            'class' => 'form-control',
            'placeholder' => 'Full Name'
        ]);
        $name->addValidator(
           new PresenceOf(['message' => 'Name is required'])
        );
        $this->add($name);

        //Email
        $email = new Text(
            'email',
            [
                'placeholder' => 'Email',
                'required' => 'true',
                'class'    => 'form-control'
            ]
        );
        $email->addValidators(
            [
                new PresenceOf(
                    [
                        'message' => 'The e-mail is required'
                    ]
                ),
                new Email(
                    [
                        'message' => 'The e-mail is not valid'
                    ]
                )
            ]
        );
        $this->add($email);

        //New password
        $password = new Password(
            'password',
            array(
                'placeholder'  => 'Your password',
                'class'        => 'form-control',
            )
        );
        $password->addValidators(
            array(
                new PresenceOf(
                    array(
                        'message' => 'Password is required'
                    )
                ),
                new StringLength(
                    array(
                        'min'            => 5,
                        'messageMinimum' => 'Password is too short. Minimum 5 characters'
                    )
                ),
                new Confirmation(
                    array(
                        'message' => 'Password doesn\'t match confirmation',
                        'with'    => 'password_confirm'
                    )
                )
            )
        );
        $this->add($password);
        //Confirm  Password
        $passwordNewConfirm = new Password(
            'password_confirm',
            array(
                'placeholder'  => 'Confirm password',
                'class'        => 'form-control',
            )
        );
        $passwordNewConfirm->addValidator(
            new PresenceOf(
                array(
                    'message' => 'The confirmation password is required'
                )
            )
        );
        $this->add($passwordNewConfirm);
    }
}