<?php

namespace Core;


use Telegram\Bot\Api;

class Telegram
{

    private static $instance;

    private function __construct($cfg)
    {
        self::$instance
            = new Api($cfg["token"]);

        if (isset($cfg["commands"]))
            self::$instance
                ->addCommands($cfg["commands"]);
    }

    static function init($cfg)
    {
        if (!self::$instance instanceof Api)
            new self($cfg);
    }

    static function getUpdates(array $params = [], $shouldEmitEvents = true)
    {
        return self::$instance->getUpdates($params, $shouldEmitEvents);
    }

    static function sendMessage($chat_id, $message) {
        return self::$instance
            ->sendMessage([
                "chat_id" => $chat_id,
                "text" => $message
            ]);
    }

    static function handle() {

    
        $updates = self::$instance->commandsHandler(false);

       
//        $updates = self::getUpdates([
//            "offset" => $update_id + 1
//        ]);
//
//        $max = 0;
//
//        foreach ($updates as $update) {
//
//
//            self::setLastUpdateId($update["update_id"]);
//            self::$instance
//                ->commandsHandler(false);
//
//
//        }

        

    }

    static function getLastUpdateId() {
        return file_get_contents(Config::telegram("update_id_file"));
    }

    static function setLastUpdateId($id) {
        file_put_contents(Config::telegram("update_id_file"), $id);
    }

}