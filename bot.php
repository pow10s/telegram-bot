<?php
require_once "vendor/autoload.php";

try {
    $bot2 = new \TelegramBot\Api\BotApi('');
    $bot = new \TelegramBot\Api\Client('438332110:AAFCgeVIz_vq6HJznmLqbvTcxbZ0v4lCEzY');

    $bot->command('start', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), "Welocme ". $message->getChat()->getFirstName() . " to notification bot" );
    });

    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}