<?php

namespace Sample;

use Suzuki\PHPUnit\MailCatcherTestCase;

class SendMailTest extends MailCatcherTestCase
{
    public function testSend()
    {
        $sendMail = new SendMail(); // Send plain text mail
        $sendMail->send();
        $sendMail->send();

        $this->assertMailCount(2);
        $this->assertMailSubject('This is a test mail');
        $this->assertMailPlainBodyContains('Hi, it is test');
        $this->assertMailHtmlBodyEmpty();
    }
}
