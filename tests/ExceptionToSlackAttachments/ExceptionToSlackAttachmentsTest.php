<?php

namespace ExceptionToSlackAttachments\Tests;

class ExceptionToSlackAttachmentsTest extends \PHPUnit_Framework_TestCase
{
    public function testToAttachments()
    {
        $e = new \Exception('Unittest', 10);
        $attachments = \ExceptionToSlackAttachments\ExceptionToSlackAttachments::toAttachments($e);

        $this->assertEquals(false, $attachments['as_user']);
        $this->assertEquals('danger', $attachments['color']);
        $this->assertEquals('Exception', $attachments['fields'][0]['title']);
        $this->assertEquals('Exception', $attachments['fields'][0]['value']);
        $this->assertEquals('Message', $attachments['fields'][1]['title']);
        $this->assertEquals('Unittest', $attachments['fields'][1]['value']);
        $this->assertEquals('File', $attachments['fields'][2]['title']);
        $this->assertEquals(__FILE__, $attachments['fields'][2]['value']);
        $this->assertEquals('Line', $attachments['fields'][3]['title']);
        $this->assertEquals(9, $attachments['fields'][3]['value']);
        $this->assertEquals('Code', $attachments['fields'][4]['title']);
        $this->assertEquals(10, $attachments['fields'][4]['value']);
    }
}
