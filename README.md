# Runtime Messaging

This library is an intra-messaging system with runtime storage
(storage is available only per request/execution).

## Usage

```php
use Durianpeople\Messaging\Messaging;

$channel_1 = Messaging::channel('channel_1');
$channel_1->onReceiveMessage(function($message) {
    var_dump($message);
});

Messaging::send('channel_1', "Test message");
```