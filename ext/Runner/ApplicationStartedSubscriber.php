<?php

declare(strict_types=1);

namespace Ext\Runner;

use PHPUnit\Event\Application\Started;
use PHPUnit\Event\Application\StartedSubscriber as ApplicationStartedSubscriberInterface;

class ApplicationStartedSubscriber implements ApplicationStartedSubscriberInterface
{
    public function __construct()
    {
    }

    public function notify(Started $event): void
    {
        print PHP_EOL
        . sprintf('[%s]', $event->asString())
        . PHP_EOL;
    }
}
