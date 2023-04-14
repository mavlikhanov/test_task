<?php
declare(strict_types=1);

namespace App\Containers\Console;

use App\Consoles\LeadGeneratorConsole;
use App\Containers\ExecutionTimeCalculatorCalculator;
use App\Containers\Filesystem\Logger;
use App\Exceptions\ProcessException;
use App\Generators\LeadGenerator;
use App\Models\Lead;
use App\Validators\ProcessValidator;

class Handler
{
    private readonly ExecutionTimeCalculatorCalculator $executionTime;
    private readonly Logger $logger;

    public function __construct()
    {
        $this->logger = new Logger();
        $this->executionTime = new ExecutionTimeCalculatorCalculator();
        $this->executionTime->start();
    }

    /**
     * @throws ProcessException
     */
    public function run(array $arguments): void
    {
        $leadGeneratorConsole = new LeadGeneratorConsole(
            new Lead(),
            new ProcessValidator()
        );
        $leadGeneratorConsole->handle((int)$arguments[0]);

        $executedTimeDto = $this->executionTime->stop()->calculate();
        $executionTimeMessage = "Min: {$executedTimeDto->getMinutes()}, Sec: {$executedTimeDto->getSeconds()}";
        $this->logger->setLogName('result_executed_time')
            ->save($executionTimeMessage);
    }
}

