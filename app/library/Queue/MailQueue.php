<?php

namespace App\Queue;


class MailQueue extends Resque
{

    /**
     * Run a job
     *
     */
    public function perform()
    {
        $params = $this->args;
        //var_dump($params);
        $email = $params['email'];
        if (!$this->mail->send($email, 'reset', $params)) {
            throw new \Exception('Something wrong');
        }
    }
    
}
