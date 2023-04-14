<?php
declare(strict_types=1);

namespace App\Models;

interface LeadInterface
{
    public function run(int $countLead, int $step): void;
}
