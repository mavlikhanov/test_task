<?php
declare(strict_types=1);

namespace App\Validators;

interface ProcessValidatorInterface
{
    /**
     *
     */
    public const PROCESS_CAN_NOT_CREATE = -1;
    /**
     *
     */
    public const CHILD_PROCESS = 0;

    /**
     * @param int $processId
     * @return bool
     */
    public function isProcessCannotCreate(int $processId): bool;

    /**
     * @param int $processId
     * @return bool
     */
    public function isChildProcess(int $processId): bool;

    /**
     * @param int $processId
     * @return bool
     */
    public function isParentProcess(int $processId): bool;
}
