<?php

declare(strict_types=1);

namespace Ext\TestSuite;

use PHPUnit\Event\TestSuite\Finished;
use PHPUnit\Event\TestSuite\FinishedSubscriber as FinishedSubscriberInterface;

class FinishedSubscriber implements FinishedSubscriberInterface
{
    public function __construct()
    {
    }

    public function notify(Finished $event): void
    {
        echo $event->asString() . PHP_EOL;
    }
}
