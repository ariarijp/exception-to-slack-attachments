<?php

require_once __DIR__ . '/../vendor/autoload.php';

use ExceptionToSlackAttachments\ExceptionToSlackAttachments;
use Maknz\Slack;

try {
    throw new \Exception('Something went wrong');
} catch (\Exception $e) {
    $attachments = ExceptionToSlackAttachments::toAttachments($e);

    $client = new Slack\Client('http://your.slack.endpoint');
    $client->to('#general')
        ->attach($attachments)
        ->send();
}