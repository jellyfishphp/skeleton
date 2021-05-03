<?php

$rootDir = \realpath(__DIR__);

require $rootDir . '/vendor/autoload.php';

try {
    $kernel = new \Jellyfish\Kernel\Kernel($rootDir);
    $application = new \Jellyfish\Application\RoadRunner($kernel);

    $application->run();
} catch (\Throwable $throwable) {
    if (\getenv('APPLICATION_ENV') === 'development') {
        throw $throwable;
    }

    \error_log(sprintf('%s, %s, %s', $throwable->getMessage(), PHP_EOL, $throwable->getTraceAsString()));
    \http_response_code(500);
    echo 'Whooooops, internal server error!';
}
