<?php
declare(strict_types=1);

namespace App\Treads;

use LeadGenerator\Generator;
use LeadGenerator\Lead;
use Thread;

class LeadGeneratorThread extends Thread
{
    private $count;
    private $leadHandler;

    public function __construct(int $count) {
        $this->count = $count;
//        $this->leadHandler = $leadHandler;
    }

    public function run()
    {
        $generator = new Generator();
        $generator->generateLeads($this->count, function (Lead $lead) {
            sleep(2);
            $dateTime = new \DateTime();
            $logMessage = "{$lead->id} | {$lead->categoryName} | {$dateTime->format('Y-m-d H:i:s')}";
            file_put_contents('log.txt', $logMessage . PHP_EOL, FILE_APPEND);
        });
    }
}
