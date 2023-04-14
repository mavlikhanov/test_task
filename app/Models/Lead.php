<?php
declare(strict_types=1);

namespace App\Models;

use App\Generators\LeadGeneratorInterface;

class Lead implements LeadInterface
{
    public function __construct(
        private readonly LeadGeneratorInterface $generator
    )
    {}

    public function run(int $countLead, int $step): void
    {
        $processor = new LeadProcessor();
        if (method_exists($this->generator, 'setStep')) {
            $this->generator->setStep($step);
        }
        $this->generator->generateLeads($countLead, [$processor, 'process']);
    }
}
