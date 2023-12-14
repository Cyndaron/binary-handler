<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Writer\Interfaces;

use Cyndaron\BinaryHandler\Shared\Interfaces\BinaryHandlerInterface;

interface WriterInterface extends BinaryHandlerInterface
{
    public function writeBytes(string $bytes): int;
}
