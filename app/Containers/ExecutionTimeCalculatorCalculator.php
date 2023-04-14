<?php
declare(strict_types=1);

namespace App\Containers;

use App\Containers\DataTransferObjects\ExecutionTimeDto;

class ExecutionTimeCalculatorCalculator implements ExecutionTimeCalculatorInterface
{
    private float $startTime;
    private float $endTime;

    public function start(): void
    {
        $this->startTime = microtime(true);
    }

    public function stop(): ExecutionTimeCalculatorInterface
    {
        $this->endTime = microtime(true);
        return $this;
    }

    public function calculate(): ExecutionTimeDto
    {
        $executionTime = ($this->endTime - $this->startTime);
        $minutes = floor($executionTime / 60);
        $seconds = round($executionTime - ($minutes * 60));
        return new ExecutionTimeDto($minutes, $seconds);
    }
}
