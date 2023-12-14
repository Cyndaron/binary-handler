<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Reader\Interfaces;

use Cyndaron\BinaryHandler\Shared\Interfaces\BinaryHandlerInterface;

interface ReaderInterface extends BinaryHandlerInterface
{
    public function readBytes(int $numBytes): string;
}
