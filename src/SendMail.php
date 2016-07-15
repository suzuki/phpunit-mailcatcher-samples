<?php

namespace Sample;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class SendMail
{
    private $mailer;

    public function __construct(Swift_Mailer $mailer = null)
    {
        if ($mailer === null) {
            $host = 'localhost';
            $port = 1025;

            $transport = Swift_SmtpTransport::newInstance($host, $port);
            $mailer = Swift_Mailer::newInstance($transport);
        }

        $this->mailer = $mailer;
    }

    public function send()
    {
        $message = Swift_Message::newInstance();
        $message
            ->setTo('suzuki@example.com')
            ->setFrom('suzuki@example.jp')
            ->setSubject('This is a test mail')
            ->setBody('Hi, it is test.')
            ;

        $this->mailer->send($message);
    }
}
