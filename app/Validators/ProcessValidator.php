<?php
declare(strict_types=1);

namespace App\Validators;

class ProcessValidator implements ProcessValidatorInterface
{
    /**
     * @param int $processId
     * @return bool
     */
    public function isProcessCannotCreate(int $processId): bool
    {
        return $processId == ProcessValidatorInterface::PROCESS_CAN_NOT_CREATE;
    }

    /**
     * @param int $processId
     * @return bool
     */
    public function isChildProcess(int $processId): bool
    {
        return $processId == ProcessValidatorInterface::CHILD_PROCESS;
    }

    /**
     * @param int $processId
     * @return bool
     */
    public function isParentProcess(int $processId): bool
    {
        return $processId > ProcessValidatorInterface::CHILD_PROCESS;
    }
}
