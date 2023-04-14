<?php
declare(strict_types=1);

namespace App\Consoles;

use App\Containers\AbstractConsole;
use App\Exceptions\ProcessException;
use App\Models\LeadInterface;
use App\Validators\ProcessValidatorInterface;

class LeadGeneratorConsole extends AbstractConsole
{
    private int $lastId;

    public function __construct(
        private readonly LeadInterface             $lead,
        private readonly ProcessValidatorInterface $processValidator
    ) {}

    /**
     * @throws ProcessException
     */
    public function handle(int $countLead): void
    {
        $countTreads = $this->calculateCountTreads($countLead);
        $leadsPerProcess = ceil($countLead / $countTreads);
        $childProcesses = [];

        $startPosition = intval(ceil($countLead / $countTreads));

        for ($treadItem = 0; $treadItem < $countTreads; $treadItem++) {
            $processId = pcntl_fork();

            if ($this->processValidator->isProcessCannotCreate($processId)) {
                throw new ProcessException('Ошибка при создании процесса');
            }
            if ($this->processValidator->isParentProcess($processId)) {
                $childProcesses[] = $processId;
                continue;
            }

            $start = $treadItem * $leadsPerProcess + 1;
            $end = min(($treadItem + 1) * $leadsPerProcess, $countLead);
            $countElements = intval($end - $start + 1);

            $step = $treadItem * $startPosition;

            $this->lead->run($countElements, $step);
            exit(0);
        }

        foreach ($childProcesses as $pid) {
            pcntl_waitpid($pid, $status);
        }
    }

    private function calculateCountTreads(int $countLead): int
    {
        $averageExecutionTime = LeadGeneratorConsoleInterface::AVERAGE_EXECUTION_TIME_SEC;
        $requiredTime = LeadGeneratorConsoleInterface::REQUIRED_EXECUTION_TIME_SEC;
        $result = ($countLead * $averageExecutionTime) / $requiredTime;
        return intval(ceil($result));
    }
}
