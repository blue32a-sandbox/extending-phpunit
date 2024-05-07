<?php

declare(strict_types=1);

namespace Ext\Test;

use PHPUnit\Event\Test\Failed;
use PHPUnit\Event\Test\FailedSubscriber as FailedSubscriberInterface;

class FailedSubscriber implements FailedSubscriberInterface
{
    public function __construct()
    {
    }

    public function notify(Failed $event): void
    {
        echo $event->asString() . PHP_EOL;
    }
}
