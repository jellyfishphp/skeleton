<?php

$rootDir = realpath(__DIR__);

require $rootDir . '/vendor/autoload.php';

$kernel = new \Jellyfish\Kernel\Kernel($rootDir);
$application = new \Jellyfish\Application\RoadRunner($kernel);

$application->run();
