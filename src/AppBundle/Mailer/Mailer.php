<?php

namespace AppBundle\Mailer;

class Mailer {

    protected $mailer;

    public function __construct(Mailer $mailer) 
    {
        $this->mailer = $mailer;
    }

    public function sendMail($to, $field, $date, $hour, $user) 
    {
        $message = $this->mailer
                ->setSubject('Hello Email')
                ->setFrom('send@example.com')
                ->setTo($to)
                ->setBody(
                $this->renderView(
                        'Emails/registration.html.twig', array('name' => $name)
                ), 'text/html'
        );
        $this->get('mailer')->send($message);

        return;
    }

}
