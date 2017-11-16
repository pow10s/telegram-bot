<?php
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\Client('438332110:AAFCgeVIz_vq6HJznmLqbvTcxbZ0v4lCEzY');

    $bot->command('start', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'Hello, ' .$message->getChat()->getFirstName() .'. Thank`s for subscribing. Commands list: /help' );
    });

    $bot->command('search', function ($message) use ($bot) {
        $keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['text' => 'Categories', 'callback_data' => 'categories'],
                    ['text' => 'Keyword', 'callback_data' => 'keyword'],
                ]
            ]
        );
        $bot->sendMessage($message->getChat()->getId(), "Search by:", null, false, null, $keyboard );
    });

    $bot->command('help', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'Command list:');
    });


    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}