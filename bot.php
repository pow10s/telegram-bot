<?php
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\Client('438332110:AAFCgeVIz_vq6HJznmLqbvTcxbZ0v4lCEzY');

    $bot->command('start', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), "Welcome, ". $message->getChat()->getFirstName() . ", to notification bot." );
    });

    $bot->command('search', function ($message) use ($bot) {
        $keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['text' => 'link', 'url' => 'https://core.telegram.org']
                ]
            ]
        );
        $bot->sendMessage($message->getChat()->getId(), "Search by:", null, false, null, $keyboard );
    });
    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}