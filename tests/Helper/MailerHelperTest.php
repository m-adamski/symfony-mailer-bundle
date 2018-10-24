<?php

namespace Adamski\Symfony\MailerBundleTests\Helper;

use Adamski\Symfony\MailerBundle\Helper\MailerHelper;
use PHPUnit\Framework\TestCase;
use Swift_Mailer;
use Twig\Environment;

class MailerHelperTest extends TestCase {

    /**
     * @var MailerHelper
     */
    protected $mailerHelper;

    /**
     * {@inheritdoc}
     */
    protected function setUp() {

        $mailerMock = $this->createMock(Swift_Mailer::class);
        $mailerMock->method("send")
            ->willReturn(1);

        $twigMock = $this->createMock(Environment::class);
        $twigMock->method("render")
            ->willReturn("<html></html>");

        $this->mailerHelper = new MailerHelper(
            "noreply@example.com", "no-reply", $mailerMock, $twigMock
        );
    }

    /**
     * Test of buildMessage method
     */
    public function testBuildMessage() {

        $generatedMessage = $this->mailerHelper->buildMessage("subject", "body", "text/html", "utf8");

        $this->assertArrayHasKey("noreply@example.com", $generatedMessage->getFrom());
        $this->assertEquals(
            ["subject", "body", "text/html", "utf8"],
            [$generatedMessage->getSubject(), $generatedMessage->getBody(), $generatedMessage->getContentType(), $generatedMessage->getCharset()]
        );
    }

    /**
     * Test of sendMessage method.
     */
    public function testSendMessage() {

        $generatedMessage = $this->mailerHelper->buildMessage("subject", "body", "text/html", "utf8");

        $failedRecipients = [];
        $sendResponse = $this->mailerHelper->sendMessage($generatedMessage, $failedRecipients);

        $this->assertEquals(1, $sendResponse);
        $this->assertEquals([], $failedRecipients);
    }

    /**
     * Test of renderTemplate method.
     */
    public function testRenderTemplate() {

        $generatedTemplate = $this->mailerHelper->renderTemplate("template.html.twig");

        $this->assertEquals("<html></html>", $generatedTemplate);
    }
}
