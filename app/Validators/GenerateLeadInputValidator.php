<?php
declare(strict_types=1);

namespace App\Validators;

class GenerateLeadInputValidator
{
    private array $arguments;

    public function setArguments(array $arguments): GenerateLeadInputValidator
    {
        $this->arguments = $arguments;
        return $this;
    }

    public function isLeadCountPassed(): bool
    {
        return isset($this->arguments[0]);
    }

    public function isLeadCountValid(): bool
    {
        return is_numeric($this->arguments[0]);
    }
}
