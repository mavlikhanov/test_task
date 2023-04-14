<?php
declare(strict_types=1);

namespace App\Models;

use LeadGenerator\Generator;

class Lead implements LeadInterface
{
    public function run(int $countLead): void
    {
        $leadGenerator = new Generator();
        $processor = new LeadProcessor();
        $leadGenerator->generateLeads($countLead, [$processor, 'process']);
    }
}
