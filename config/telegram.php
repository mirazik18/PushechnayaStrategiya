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
    "update_id_file" => Helpers::path("data", "update_id.txt"),
    "keyboard"=>[
        ["one", "two", "three"],
        ["one", "two"],
        ["one"]
    ]
];