<?php
declare(strict_types=1);

namespace App\Generators;

use LeadGenerator\Generator;
use LeadGenerator\Lead;

class LeadGenerator extends Generator implements LeadGeneratorInterface
{
    private int $step;

    public function setStep(int $step): LeadGenerator
    {
        $this->step = $step;
        return $this;
    }

    /**
     * @param int $count
     * @param callable $leadHandler
     */
    public function generateLeads(int $count, callable $leadHandler): void
    {
        for ($i = $this->step + 1; $i <= $this->step + $count; $i++) {
            $lead = new Lead();
            $lead->id = $i;
            $lead->categoryName = $this->getRandCategory();
            $leadHandler($lead);
        }
    }

    /**
     * @return string
     */
    private function getRandCategory(): string
    {
        $categories = [
            'Buy auto',
            'Buy house',
            'Get loan',
            'Cleaning',
            'Learning',
            'Car wash',
            'Repair smth',
            'Barbershop',
            'Pizza',
            'Car insurance',
            'Life insurance'
        ];

        return $categories[array_rand($categories)];
    }
}
