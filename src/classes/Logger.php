<?php
declare(strict_types=1);

namespace App\classes;

use App\interfaces\LoggerInterface;
use App\traits\LoggerTrait;

class Logger implements LoggerInterface
{
    use LoggerTrait;

    public function log(string $message): void
    {
        echo $this->formaterLog($message);
    }
}