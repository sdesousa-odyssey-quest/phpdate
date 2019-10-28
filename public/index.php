<?php

require '../src/TimeTravel/TimeTravel.php';

$timezone = new DateTimeZone('America/Los_Angeles');
$start = new DateTime('1985-12-31 00:00:00', $timezone);
$end = new DateTime('1885-06-14 02:51:00', $timezone);

$travel = new \App\TimeTravel\TimeTravel();
$travel->setStart($start);
$travel->setEnd($end);
var_dump($travel);
echo $travel->getTravelInfo();

$interval = new DateInterval('PT1000000000S');
$interval->invert = 1;
$back = $travel->findDate($interval);
var_dump($back);
$travel->setEnd($back);
var_dump($travel);

$step = new DateInterval('P1M8D');
var_dump($step);
$period = new DatePeriod($travel->getEnd(), $step, $travel->getStart());
$jumps = $travel->backToFutureStepByStep($period);
var_dump($jumps);
