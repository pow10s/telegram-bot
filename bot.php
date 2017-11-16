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
        $commandList = "Command list:
                        /start - start work with bot
                         /stop - stop work with bot
                         /search - search posts by categories
                         /admin - site administrator panel
                         if you want get quote input random message
                        ";
        $bot->sendMessage($message->getChat()->getId(), $commandList);
    });

    $bot->callbackQuery(function (\TelegramBot\Api\Types\CallbackQuery $callbackQuery) use ($bot){
        $bot->editMessageText($callbackQuery->getId(), $callbackQuery->getChatInstance(), 'test');
        $bot->answerCallbackQuery($callbackQuery->getId(), 'test');
    });
    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}