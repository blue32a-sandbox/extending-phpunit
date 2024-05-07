<?php

declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestDox;
use PHPUnit\Framework\TestCase;

#[TestDox('サンプルクラス')]
class SampleTest extends TestCase
{
    #[Test]
    public function samplePass(): void
    {
        $this->assertSame(1, 1);
    }

    #[Test]
    public function sampleFail(): void
    {
        $this->assertSame(1, 2);
    }

    #[Test]
    public function sampleSkipp(): void
    {
        $this->markTestSkipped();
    }

    #[DataProvider('sampleDataProvider')]
    #[Test]
    public function parameterizedTest(string $str): void
    {
        $this->assertSame('foo', $str);
    }

    public static function sampleDataProvider(): array
    {
        return [
            'foo' => ['foo'],
            'bar' => ['bar'],
        ];
    }

    #[Test]
    public function defaultAssert(): void
    {
        assert(1 === 2);
    }
}
