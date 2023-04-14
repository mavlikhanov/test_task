<?php
declare(strict_types=1);

namespace App\Containers\Filesystem;

interface LoggerInterface
{
    /**
     * @param string $logName
     * @return LoggerInterface
     */
    public function setLogName(string $logName): LoggerInterface;

    /**
     * @param string $message
     * @return void
     */
    public function save(string $message): void;
}
