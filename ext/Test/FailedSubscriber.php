<?php

declare(strict_types=1);

namespace Ext\Test;

use PHPUnit\Event\Test\Failed;
use PHPUnit\Event\Test\FailedSubscriber as FailedSubscriberInterface;
use PHPUnit\TextUI\Output\Printer;
use PHPUnit\Util\Color;

class FailedSubscriber implements FailedSubscriberInterface
{
    readonly private Printer $printer;

    public function __construct(Printer $printer)
    {
        $this->printer = $printer;
    }

    public function notify(Failed $event): void
    {
        $this->printer->print(Color::colorizeTextBox('bg-red, fg-white', 'F') . PHP_EOL);
    }
}
