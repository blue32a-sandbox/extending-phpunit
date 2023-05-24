<?php

declare(strict_types=1);

namespace Tests;

use App\IntClosedRange;
use PHPUnit\Framework\TestCase;

/**
 * @testdox 整数閉区間を扱うIntClosedRangeクラス
 */
class IntClosedRangeTest extends TestCase
{
    public static function validArgDataProvider(): array
    {
        return [
            '下端点と上端点がプラスの整数閉区間' => [3, 8],
            '下端点と上端点がマイナスの整数閉区間' => [-6, -1],
            '下端点と上端点が同じ整数閉区間' => [3, 3],
            '下端点がゼロの整数閉区間' => [0, 5],
            '上端点がゼロの整数閉区間' => [-4, 0],
        ];
    }

    /**
     * @dataProvider validArgDataProvider
     * @test
     */
    public function IntClosedRangeクラスは上端点、下端点を引数に取る(int $lower, int $upper): void
    {
        // 準備＆実行
        $intClosedRange = new IntClosedRange(lower: $lower, upper: $upper);
        // 検証
        $this->assertIsObject($intClosedRange);
    }

    /**
     * @test
     */
    public function IntClosedRangeクラスは上端点より大きい下端点を与えらたときに例外を発生させる(): void
    {
        // 検証
        $this->expectException(\DomainException::class);
        // 準備＆実行
        new IntClosedRange(lower: 5, upper: 4);
    }

    /**
     * @test
     */
    public function lowerメソッドは整数閉区間の下端点を返す_下端点3を持つとき3を返す(): void
    {
        // 準備
        $intClosedRange = new IntClosedRange(lower: 3, upper: 8);
        // 実行＆検証
        $this->assertSame(3, $intClosedRange->lower());
    }

    /**
     * @test
     */
    public function upperメソッドは整数閉区間の上端点を返す_上端点8を持つとき8を返す(): void
    {
        // 準備
        $intClosedRange = new IntClosedRange(lower: 3, upper: 8);
        // 実行＆検証
        $this->assertSame(8, $intClosedRange->upper());
    }

    public static function toStringDataProvider(): array
    {
        return [
            '下端点3、上端点8のときは文字列[3,8]を返す' => [3, 8, '[3,8]'],
            '下端点-6、上端点-1のときは文字列[-6,-1]を返す' => [-6, -1, '[-6,-1]'],
        ];
    }

    /**
     * @dataProvider toStringDataProvider
     * @test
     */
    public function IntClosedRangeオブジェクトは上端点、下端点を含む文字列に変換できる(
        int $lower,
        int $upper,
        string $expected
    ): void {
        // 準備＆実行
        $intClosedRange = new IntClosedRange(lower: $lower, upper: $upper);
        // 検証
        $this->assertSame($expected, strval($intClosedRange));
    }

    public static function includesDataProvider(): array
    {
        return [
            '引数に3を与えるとtrueを返す' => [3, true],
            '引数に8を与えるとtrueを返す' => [8, true],
            '引数に2を与えるとfalseを返す' => [2, false],
            '引数に9を与えるとfalseを返す' => [9, false],
        ];
    }

    /**
     * @dataProvider includesDataProvider
     * @test
     */
    public function includeメソッドは引数の値が閉区間に含まれるかどうかを判定する_下端点3、上端点8のとき(
        int $arg,
        bool $expected
    ): void {
        // 準備
        $intClosedRange = new IntClosedRange(lower: 3, upper: 8);
        // 実行＆検証
        $this->assertSame($expected, $intClosedRange->includes($arg));
    }

    /**
     * @test
     */
    public function equalsメソッドは整数閉区間の等価比較ができる_下端点と上端点が両方一致する場合はtrueを返す(): void
    {
        $intClosedRangeA = new IntClosedRange(lower: 3, upper: 8);
        $intClosedRangeB = new IntClosedRange(lower: 3, upper: 8);
        $this->assertTrue($intClosedRangeA->equals($intClosedRangeB));
    }

    public static function notEqualsDataProvider(): array
    {
        return [
            '下端点のみ一致しない整数閉区間' => [new IntClosedRange(lower: 3, upper: 9)],
            '上端点のみ一致しない整数閉区間' => [new IntClosedRange(lower: 2, upper: 8)],
            '下端点も上端点も一致しない整数閉区間' => [new IntClosedRange(lower: 4, upper: 9)],
        ];
    }

    /**
     * @dataProvider notEqualsDataProvider
     * @test
     */
    public function equalsメソッドは整数閉区間の等価比較ができる_下端点と上端点が両方一致しない場合はfalseを返す(
        IntClosedRange $intClosedRangeB
    ): void {
        $intClosedRangeA = new IntClosedRange(lower: 3, upper: 8);
        $this->assertFalse($intClosedRangeA->equals($intClosedRangeB));
    }

    public static function containsDataProvider(): array
    {
        return [
            '完全に含まれる場合はtrueを返す' => [new IntClosedRange(lower: 3, upper: 8), true],
            '下端点が含まれない場合はfalseを返す' => [new IntClosedRange(lower: 2, upper: 8), false],
            '上端点が含まれない場合はfalseを返す' => [new IntClosedRange(lower: 3, upper: 9), false],
            '下端点も上端店も含まれない場合はfalseを返す' => [new IntClosedRange(lower: 2, upper: 9), false],
        ];
    }

    /**
     * @dataProvider containsDataProvider
     * @test
     */
    public function containsメソッドは別の整数閉区間が完全に含まれる場合はtrueを返し、一部でも含まれない場合はfalseを返す(
        IntClosedRange $intClosedRangeB,
        bool $expected
    ): void {
        $intClosedRangeA = new IntClosedRange(lower: 3, upper: 8);
        $this->assertSame($expected, $intClosedRangeA->contains($intClosedRangeB));
    }
}
