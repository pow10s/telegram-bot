<?php
require_once "vendor/autoload.php";
try {
    $bot = new \TelegramBot\Api\Client('438332110:AAFCgeVIz_vq6HJznmLqbvTcxbZ0v4lCEzY');
    $bot->command('devanswer', function ($message) use ($bot) {
        preg_match_all('/{"text":"(.*?)",/s', file_get_contents('http://devanswers.ru/'), $result);
        $bot->sendMessage($message->getChat()->getId(),
            str_replace("<br/>", "\n", json_decode('"' . $result[1][0] . '"')));
    });
    $bot->command('qaanswer', function ($message) use ($bot) {
        $data = json_decode(file_get_contents('php://input'));
        $bot->sendMessage($message->getChat()->getId(),  $data->{'message'}->{'text'});
            $bot->on(function ($update) use ($bot){
                if($update->getMessage()->getText() == 'hi')
                $bot->sendMessage('75586930', 'test');
            });
    });
    $bot->run();
} catch (\TelegramBot\Api\Exception $e) {
    $e->getMessage();
}
