<?php

namespace AppBundle\Mailer;

use Swift_Mailer;

class Mailer
{

    protected $mailer;

    public function __construct(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMail($to)
    {
        $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('rayvexx@gmail.com')
                ->setTo($to);

        $message->setBody('ok');

        return $this->mailer->send($message);
    }

}
