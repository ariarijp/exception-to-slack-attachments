# exception-to-slack-attachments
Format PHP Exception to Slack Attachments array for maknz/slack.

[![Circle CI](https://circleci.com/gh/ariarijp/exception-to-slack-attachments.svg?style=svg)](https://circleci.com/gh/ariarijp/exception-to-slack-attachments)

## Requirements
PHP 5.5+ required.

## Installation
Add these lines to your `composer.json`.

```json
"require": {
    "ariarijp/exception-to-slack-attachments": "dev-master"
}
```

## Usage example

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Maknz\Slack;
use ExceptionToSlackAttachments\ExceptionToSlackAttachments;

try {
    throw new \Exception('Something went wrong');    
} catch (\Exception $e) {
    $attachments = ExceptionToSlackAttachments::toAttachments($e);

    $client = new Slack\Client('http://your.slack.endpoint');
    $client->to('#general')
        ->attach($attachments)
        ->send();
}
```

Run above code, then you will receive message like below.

![example](doc/example.png)


## License
MIT

## Author
[ariarijp](https://github.com/ariarijp)
