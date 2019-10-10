<?php

include "vendor/autoload.php";
const LIMIT =60;
const SAFE = 1;
set_time_limit(LIMIT);
$time=[];
do
{
    $start = microtime(true);
    new App();

    $time[]=microtime(true)-$start;
}while(array_sum($time)/1000<=LIMIT-max($time)/1000);
echo "ended";