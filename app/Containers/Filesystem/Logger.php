<?php
declare(strict_types=1);

namespace App\Containers\Filesystem;

class Logger implements LoggerInterface
{
    /**
     * @var string
     */
    private string $logName;

    /**
     * @param string $logName
     * @return LoggerInterface
     */
    public function setLogName(string $logName): LoggerInterface
    {
        $this->logName = $logName;
        return $this;
    }

    /**
     * @param string $message
     * @return void
     */
    public function save(string $message): void
    {
        file_put_contents($this->getLogName(), $message . PHP_EOL, FILE_APPEND);
    }

    /**
     * @return string
     */
    private function getLogName(): string
    {
        if (empty($this->logName)) {
            return uniqid() . '.txt';
        }
        return $this->logName . '.txt';
    }
}
