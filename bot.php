<?php
require_once "vendor/autoload.php";
try {
    $bot = new \TelegramBot\Api\Client('438332110:AAFCgeVIz_vq6HJznmLqbvTcxbZ0v4lCEzY');
    $bot->command('start', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(),
            'Hello,' . $message->getChat()->getFirstName() . ', thank`s for subscribing. Commands list: /help');
    });
    $bot->command('help', function ($message) use ($bot) {
        $commandList = 'List of commands:
                         /start - start work with bot
                         /stop - stop work with bot
                         /search - search posts by categories
                         /admin - site administrator panel
                         if you want get quote input random message';
        $bot->sendMessage($message->getChat()->getId(), $commandList);
    });
    $bot->command('search', function ($message) use ($bot) {
        $keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['text' => 'Categories', 'callback_data' => 'categories'],
                    ['text' => 'Keyword', 'callback_data' => 'keyword']
                ]
            ]
        );
        $bot->sendMessage($message->getChat()->getId(), 'Search by:', null, false, null, $keyboard);
    });
    $bot->command('admin', function ($message) use ($bot) {
        /*Need verification if logged user*/
        $keyboard = new \TelegramBot\Api\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['text' => 'Login', 'callback_data' => 'login'],
                    ['text' => 'Create post', 'callback_data' => 'create-post'],
                    ['text' => 'Delete post', 'callback_data' => 'delete-post'],
                ]
            ]
        );
        /*End verification if logged user*/
        $bot->sendMessage($message->getChat()->getId(), 'Hello, you are in admin panel!', null, false, null, $keyboard);

    });
    print_r(json_encode($bot->getRawBody()));
    $bot->callbackQuery(function (\TelegramBot\Api\Types\CallbackQuery $callbackQuery) use ($bot) {
        if ($callbackQuery->getData() == 'categories') {
            /*WORDPRESS CODE...*/
            $bot->sendMessage($callbackQuery->getFrom()->getId(), 'List of categories:');
        } elseif ($callbackQuery->getData() == 'keyword') {
            /*WORDPRESS CODE...*/
            $bot->sendMessage($callbackQuery->getFrom()->getId(), 'Searching by keywords');
        } elseif ($callbackQuery->getData() == 'login') {
            /*WORDPRESS CODE...*/
            $bot->sendMessage($callbackQuery->getFrom()->getId(), 'Login functionality');
        } elseif ($callbackQuery->getData() == 'create-post') {
            /*WORDPRESS CODE...*/
            $bot->sendMessage($callbackQuery->getFrom()->getId(), 'Post created');
        } elseif ($callbackQuery->getData() == 'delete-post') {
            /*WORDPRESS CODE...*/
            $bot->sendMessage($callbackQuery->getFrom()->getId(), 'Post deleted');
        }
    });
    $bot->run();
} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}
