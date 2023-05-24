<?php

declare(strict_types=1);

namespace Ext\Runner;

use PHPUnit\Event\TestRunner\ExecutionFinished;
use PHPUnit\Event\TestRunner\ExecutionFinishedSubscriber as ExecutionFinishedSubscriberInterface;

final class ExecutionFinishedSubscriber implements ExecutionFinishedSubscriberInterface
{
    public function __construct()
    {
    }

    public function notify(ExecutionFinished $event): void
    {
        print PHP_EOL
        . sprintf(
            '[%s] %s',
            $event->asString(),
            $event->telemetryInfo()->asString()
        )
        . PHP_EOL;
    }
}
