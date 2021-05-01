<?php

use Jellyfish\Config\ConfigServiceProvider;
use Jellyfish\Console\ConsoleServiceProvider;
use Jellyfish\Event\EventServiceProvider;
use Jellyfish\FilesystemSymfony\FilesystemSymfonyServiceProvider;
use Jellyfish\FinderSymfony\FinderSymfonyServiceProvider;
use Jellyfish\HttpLeague\HttpLeagueServiceProvider;
use Jellyfish\LockSymfony\LockSymfonyServiceProvider;
use Jellyfish\LogMonolog\LogMonologServiceProvider;
use Jellyfish\ProcessSymfony\ProcessSymfonyServiceProvider;
use Jellyfish\QueueRabbitMq\QueueRabbitMqServiceProvider;
use Jellyfish\RoadRunner\RoadRunnerServiceProvider;
use Jellyfish\Scheduler\SchedulerServiceProvider;
use Jellyfish\SerializerSymfony\SerializerSymfonyServiceProvider;
use Jellyfish\Transfer\TransferServiceProvider;
use Jellyfish\UuidRamsey\UuidRamseyServiceProvider;

// Core
$serviceProviders[] = new ConfigServiceProvider();
$serviceProviders[] = new ConsoleServiceProvider();
$serviceProviders[] = new LogMonologServiceProvider();
$serviceProviders[] = new ProcessSymfonyServiceProvider();
$serviceProviders[] = new LockSymfonyServiceProvider();
$serviceProviders[] = new SerializerSymfonyServiceProvider();
$serviceProviders[] = new HttpLeagueServiceProvider();
$serviceProviders[] = new RoadRunnerServiceProvider();
$serviceProviders[] = new SchedulerServiceProvider();
$serviceProviders[] = new FinderSymfonyServiceProvider();
$serviceProviders[] = new FilesystemSymfonyServiceProvider();
$serviceProviders[] = new TransferServiceProvider();

// EVENT
$serviceProviders[] = new QueueRabbitMqServiceProvider();
$serviceProviders[] = new EventServiceProvider();
$serviceProviders[] = new UuidRamseyServiceProvider();
