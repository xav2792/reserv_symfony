<?php

namespace AppBundle\Mailer;

use Swift_Mailer;

class Mailer {

    protected $mailer;

    public function __construct(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMail($to, $field, $date, $hour, $user) 
    {
        $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('send@example.com')
                ->setTo($to);

        $message->setBody('ok');

        return $this->mailer->send($message);
    }

}
