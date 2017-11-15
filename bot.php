<?php
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\Client('438332110:AAFCgeVIz_vq6HJznmLqbvTcxbZ0v4lCEzY');
    // or initialize with botan.io tracker api key
    // $bot = new \TelegramBot\Api\Client('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');


    $bot->command('hi', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), "Hello world" );
    });

    $bot->run();

} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}