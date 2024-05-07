<?php

declare(strict_types=1);

namespace Ext\Test;

use PHPUnit\Event\Test\Finished;
use PHPUnit\Event\Test\FinishedSubscriber as FinishedSubscriberInterface;

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
