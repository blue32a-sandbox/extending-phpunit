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

class Extension implements PhpunitExtension
{
    public function bootstrap(Configuration $configuration, EventFacade $facade, ParameterCollection $parameters): void
    {
        $facade->replaceProgressOutput();

        $facade->registerSubscribers(
            new ApplicationStartedSubscriber(),
            new ExecutionFinishedSubscriber(),
            new FailedSubscriber(),
            new PassedSubscriber(),
            new SkippedSubscriber(),
            new TestFinishedSubscriber(),
            new TestSuiteFinishedSubscriber(),
        );
    }
}
