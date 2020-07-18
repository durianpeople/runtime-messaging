<?php


namespace Durianpeople\Messaging;


use Closure;
use RuntimeException;

class Messaging
{
    private static array $channels = [];

    private Closure $onReceive;

    public static function channel(string $channel_name): Messaging
    {
        return self::$channels[$channel_name] ?? self::$channels[$channel_name] = new Messaging();
    }

    public static function send(string $to_channel, $message)
    {
        /** @var Messaging $channel */
        $channel = self::$channels[$to_channel];
        if (isset($channel)) {
            call_user_func($channel->onReceive, $message);
        } else {
            throw new RuntimeException("Channel not found");
        }
    }

    public function onReceiveMessage(Closure $callback)
    {
        $this->onReceive = $callback;
    }
}