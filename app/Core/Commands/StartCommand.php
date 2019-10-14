<?php

namespace Core\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{

    protected $name = "start";
    protected $description = "Start Command to get you started";

    public function handle($args)
    {
        $message = "Hello! Welcome to our bot, Here are our available commands:";
        $chat_id = $this->getUpdate()->getMessage()->getChat()->getId();
        $this->getTelegram()->sendMessage([
            "chat_id" => $chat_id,
            "text" => $message
        ]);
        $this->triggerCommand('help');

    }
}