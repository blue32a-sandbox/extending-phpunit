<?php

declare(strict_types=1);

namespace Ext;

use Ext\Runner\ApplicationStartedSubscriber;
use Ext\Runner\ExecutionFinishedSubscriber;
use Ext\Test\FailedSubscriber;
use Ext\Test\FinishedSubscriber as TestFinishedSubscriber;
use Ext\Test\PassedSubscriber;
use Ext\Test\SkippedSubscriber;
use Ext\TestSuite\FinishedSubscriber as TestSuiteFinishedSubscriber;
use PHPUnit\Runner\Extension\Extension as PhpunitExtension;
use PHPUnit\Runner\Extension\Facade as EventFacade;
use PHPUnit\Runner\Extension\ParameterCollection;
use PHPUnit\TextUI\Configuration\Configuration;
use PHPUnit\TextUI\Output\DefaultPrinter;

class Extension implements PhpunitExtension
{
    public function bootstrap(Configuration $configuration, EventFacade $facade, ParameterCollection $parameters): void
    {
        $facade->replaceProgressOutput();

        $printer = DefaultPrinter::standardOutput();
        $facade->registerSubscribers(
            new ApplicationStartedSubscriber(),
            new ExecutionFinishedSubscriber(),
            new FailedSubscriber($printer),
            new PassedSubscriber(),
            new SkippedSubscriber(),
            new TestFinishedSubscriber(),
            new TestSuiteFinishedSubscriber(),
        );
    }
}
