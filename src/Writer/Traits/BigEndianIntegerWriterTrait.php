<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Writer\Traits;

use function pack;

trait BigEndianIntegerWriterTrait
{
    public function writeUint8BE(int $value): int
    {
        return $this->writeBytes(pack('C', $value));
    }

    public function writeUint16BE(int $value): int
    {
        return $this->writeBytes(pack('n', $value));
    }

    public function writeUint32BE(int $value): int
    {
        return $this->writeBytes(pack('N', $value));
    }

    public function writeUint64BE(int $value): int
    {
        return $this->writeBytes(pack('J', $value));
    }
}
