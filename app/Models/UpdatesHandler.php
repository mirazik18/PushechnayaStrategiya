<?php
/**
 * Created by PhpStorm.
 * User: ИсахметовБ
 * Date: 10.10.2019
 * Time: 20:52
 */

namespace Models;


use Core\Config;
use Telegram\Bot\Api;
use Telegram\Bot\Objects\Update;

class UpdatesHandler
{
    private $telegram;
    public function __construct(Api $telegram, $updates)
    {
        $this->telegram = $telegram;
        $this->handleAll($updates);
    }
    private function handleAll($updates) {

        foreach ($updates as $update)
            $this->handleOne($update);
    }
    private function handleOne(Update $update) {
        $markup = $this->telegram->replyKeyboardMarkup([
            'keyboard' => Config::telegram("keyboard"),
            'resize_keyboard' => true
        ]);

        var_dump($markup);

        $text = $update->getMessage()->getText();
        $this->telegram->sendMessage([
            "chat_id" => $update->getMessage()->getChat()->getId(),
            "text" => TextHandler::handle($text),
            "reply_markup" => $markup
        ]);
    }
}