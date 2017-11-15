\<?php
require_once "vendor/autoload.php";

try {
    $bot = new \TelegramBot\Api\BotApi('438332110:AAFCgeVIz_vq6HJznmLqbvTcxbZ0v4lCEzY');
    $bot->setWebhook('https://desolate-crag-11963.herokuapp.com/bot.php');
    echo "Hook has been set";
} catch (\TelegramBot\Api\Exception $e) {
    echo $e->getMessage();
}