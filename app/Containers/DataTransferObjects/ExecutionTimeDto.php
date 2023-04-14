<?php
declare(strict_types=1);

namespace App\Containers\DataTransferObjects;

class ExecutionTimeDto
{
    public function __construct(
        private readonly float $minutes,
        private readonly float $seconds
    ) {}

    /**
     * @return float
     */
    public function getMinutes(): float
    {
        return $this->minutes;
    }

    /**
     * @return float
     */
    public function getSeconds(): float
    {
        return $this->seconds;
    }
}
