<?php
declare(strict_types=1);

namespace App\Consoles;

interface LeadGeneratorConsoleInterface
{
    public const AVERAGE_EXECUTION_TIME_SEC = 2;

    public const REQUIRED_EXECUTION_TIME_SEC = 600;

    public function handle(int $countLead): void;
}
