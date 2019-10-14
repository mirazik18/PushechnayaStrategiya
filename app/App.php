<?php

use Core\Config;
use Models\UpdatesHandler;
use Telegram\Bot\Api;

class App {

    private $telegram;

    public function __construct()
    {

        $cfg = Config::telegram();

        $this->telegram = new Api($cfg["token"]);
        $this->telegram->addCommands($cfg["commands"]);

    }

    public function loop() {

        $updates = $this->telegram->commandsHandler(false);
        new UpdatesHandler($this->telegram, $updates);

    }

}