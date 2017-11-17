<?php
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\Client('438332110:AAFCgeVIz_vq6HJznmLqbvTcxbZ0v4lCEzY');
    $bot->command('start', function ($message) use ($bot){
        $bot->sendMessage($message->getChat()->getId(), 'Hello,' .$message->getChat()->getFirstName().', thank`s for subscribing. Commands list: /help');
    });
    $bot->run();
} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}