<?php
declare(strict_types=1);

namespace App\Containers;

use App\Containers\DataTransferObjects\ExecutionTimeDto;

interface ExecutionTimeCalculatorInterface
{
    public function start(): void;

    public function stop(): ExecutionTimeCalculatorInterface;

    public function calculate(): ExecutionTimeDto;
}
