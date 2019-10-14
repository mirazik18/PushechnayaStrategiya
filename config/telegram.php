<?php

use Core\Commands\HelpCommand;
use Core\Commands\StartCommand;
use Core\Helpers;

return [
    "token" => "975522321:AAG5HPAzh7tlTLOYjjTjvidaVhzaItXO99w",
    "commands" => [
        StartCommand::class,
        HelpCommand::class
    ],

    "keyboard" => [
        ["one", "two", "three"],
        ["one", "two"],
        ["one"],
    ],
];