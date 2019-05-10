<?php

include("src/TimeTravel.php");


$start = new DateTime("31-12-1985");
$end = new DateTime('12-03-2013');

$date = new TimeTravel($start, $end);
var_dump($date->getTravelInfo());
var_dump($date->findDate(-1000000000));
var_dump($date->backToFutureStepByStep(1000000));
