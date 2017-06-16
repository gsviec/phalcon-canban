<?php

namespace App\Mail;

use Phalcon\Mvc\User\Component;
use Phalcon\Mvc\View;

require_once BASE_PATH . '/vendor/autoload.php';

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mail extends Component
{
    protected $transport;

    private function getTemplate($key, $params)
    {
        //$this->view->setViewsDir(APP_PATH . '/views/');
        $render = $this->view->getRender(
            'templates',
            $key,
            $params,
            function ($view) {
                $view->setRenderLevel(View::LEVEL_LAYOUT);
            }
        );
        if (!empty($render)) {
            return $render;
        }
        //When use template for cli
        return $this->view->getContent();
    }

    /**
     * Send email
     *
     * @param $to - email to send
     * @param $templateKey - a unique key of the template
     * @param array $params - array with params for template. If $params['subject'] not set we get subject from database;
     *
     * @return int
     */
    public function send($to, $templateKey, $params = [])
    {
        $body = $this->getTemplate($templateKey, $params);
        if (!$body) {
            throw new \Exception('You need to create templates email');
        }

        if (empty($params['subject'])) {
            $subject = 'Gsviec';
        } else {
            $subject = $params['subject'];
        }
        $mail = $this->config->mail;
        // Create the message
        $message = new Swift_Message($subject);
        $message
            ->setTo([$to])
            ->setFrom([$mail->fromEmail => $mail->fromName])
            ->setBody($body, 'text/html');

        if (!$this->transport) {
            $transport = new Swift_SmtpTransport($mail->smtp->server, $mail->smtp->port);
            $transport->setUsername($mail->smtp->username);
            $transport->setPassword($mail->smtp->password);
            $this->transport = $transport;
        }

        $mailer = new Swift_Mailer($this->transport);
        return $mailer->send($message);
    }

}
