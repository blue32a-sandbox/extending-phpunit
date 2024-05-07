<?php

declare(strict_types=1);

namespace Ext\Test;

use PHPUnit\Event\Test\Passed;
use PHPUnit\Event\Test\PassedSubscriber as PassedSubscriberInterface;

class PassedSubscriber implements PassedSubscriberInterface
{
    public function __construct()
    {
    }

    public function notify(Passed $event): void
    {
        // echo $event->test()->name() . ' passed' . PHP_EOL;
        echo '.' . PHP_EOL;
    }
}
