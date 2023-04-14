<?php
declare(strict_types=1);

namespace App\Models;

class LeadProcessor
{
    public function process(\LeadGenerator\Lead $lead): void
    {
        sleep(2);
        $dateTime = new \DateTime();
        $logMessage = "{$lead->id} | {$lead->categoryName} | {$dateTime->format('Y-m-d H:i:s')}";
        file_put_contents('log.txt', $logMessage . PHP_EOL, FILE_APPEND);
    }
}
