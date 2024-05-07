<?php

declare(strict_types=1);

namespace Ext\Test;

use PHPUnit\Event\Test\Skipped;
use PHPUnit\Event\Test\SkippedSubscriber as SkippedSubscriberInterface;

class SkippedSubscriber implements SkippedSubscriberInterface
{
    public function __construct()
    {
    }

    public function notify(Skipped $event): void
    {
        // echo $event->asString() . PHP_EOL;
        echo 'S' . PHP_EOL;
    }
}
