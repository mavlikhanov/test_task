<?php
declare(strict_types=1);

namespace App\Containers;

use App\Containers\Api\Console\BackgroundColorInterface;
use App\Containers\Api\Console\FontColorsInterface;

class ConsoleOutputHandler
{
    /**
     * 1) %s - font color
     * 2) %s - background color
     * 3) %s - message
     */
    private const MESSAGE_TEMPLATE = "\e[%s;%sm%s\e[0m\n";

    public function showMessage(string $message): void
    {
        echo $message;
    }

    public function showErrorMessage(string $message): void
    {
        echo sprintf(
            self::MESSAGE_TEMPLATE,
            BackgroundColorInterface::BACKGROUND_COLOR_RED,
            FontColorsInterface::FONT_COLOR_WHITE,
            $message
        );
    }
}
