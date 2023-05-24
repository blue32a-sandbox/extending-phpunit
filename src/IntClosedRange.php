<?php

declare(strict_types=1);

namespace App;

class IntClosedRange
{
    public function __construct(
        private int $lower,
        private int $upper
    ) {
        if ($lower > $upper) {
            throw new \DomainException();
        }
    }

    public function lower(): int
    {
        return $this->lower;
    }

    public function upper(): int
    {
        return $this->upper;
    }

    public function includes(int $num): bool
    {
        return $num >= $this->lower && $num <= $this->upper;
    }

    public function equals(self $intClosedRange): bool
    {
        return $intClosedRange->lower === $this->lower
            && $intClosedRange->upper === $this->upper;
    }

    public function contains(self $intClosedRange): bool
    {
        return $intClosedRange->lower >= $this->lower
            && $intClosedRange->upper <= $this->upper;
    }

    public function __toString(): string
    {
        return sprintf('[%d,%d]', $this->lower, $this->upper);
    }
}
