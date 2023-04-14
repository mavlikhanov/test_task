<?php
declare(strict_types=1);

namespace App\Generators;

interface LeadGeneratorInterface
{
    public function setStep(int $step): LeadGeneratorInterface;

    public function generateLeads(int $count, callable $leadHandler): void;
}
