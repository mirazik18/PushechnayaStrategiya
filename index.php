<?php

use Telegram\Bot\Api;

set_time_limit(0);

include "vendor/autoload.php";

$app = new App();

while (true) {
    try{
        $app->loop();
    }
    catch (Exception $ex){
        echo $ex->getMessage();
    }


}