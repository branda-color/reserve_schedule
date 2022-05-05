<?php
namespace App\Service;

use App\Components\JsonFormatter;

class LogService
{
    /**
     * Customize the given logger instance.
     *
     * @param  \Illuminate\Log\Logger  $logger
     * @return void
     */
    public function __invoke($logger)
    {
        foreach ($logger->getHandlers() as $handler) {
            // 設定 JsonFormatter
            $handler->setFormatter(new JsonFormatter());
        }
    }
}