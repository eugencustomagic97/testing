<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
class BotController extends Controller
{
    public function index(){
        $response = Telegram::getMe();
        $response = Telegram::removeWebhook();
        //$response = Telegram::setWebhook(['url' => 'https://webhook.site/e4240b1d-8bd3-447f-9de4-a2fd612c9d1e']);

        $res = Telegram::sendMessage([
            'chat_id' => '867008520',
            'text' => 'Привет я бот!!!'
        ]);


        dump($res);
    }


    public function callback($updates){
        $updates = Telegram::getWebhookUpdate();
        app('log')->info("Request Captured", $updates);
    }
}
