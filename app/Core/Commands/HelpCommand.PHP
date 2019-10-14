<?php
/**
 * Created by PhpStorm.
 * User: ИсахметовБ
 * Date: 09.10.2019
 * Time: 20:33
 */

namespace Core\Commands;


use Core\Telegram;
use Telegram\Bot\Commands\Command;

class HelpCommand extends Command
{

    protected $name = "help";
    protected $description = "This is help";

    public function handle($args)
    {
        $response = 'Commands: ' . PHP_EOL;
        $commands = $this->getTelegram()->getCommands();
        foreach ($commands as $command) {
            $response .= "/" . $command->getName() . " - ";
            $response .= $command->getDescription() . PHP_EOL;
        }
        $chat_id = $this->getUpdate()->getMessage()->getChat()->getId();
        $this->getTelegram()->sendMessage([
            "chat_id" => $chat_id,
            "text" => $response
        ]);
    }

}