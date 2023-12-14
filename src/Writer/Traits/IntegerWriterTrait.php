<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Writer\Traits;

use Cyndaron\BinaryHandler\IntegerSize;
use function pack;

trait IntegerWriterTrait
{
    public function writeUint8(int $value): int
    {
        return $this->writeBytes(pack('C', $value));
    }

    public function writeUint16(int $value): int
    {
        return $this->writeBytes(pack('v', $value));
    }

    public function writeUint32(int $value): int
    {
        return $this->writeBytes(pack('V', $value));
    }

    public function writeUint64(int $value): int
    {
        return $this->writeBytes(pack('P', $value));
    }

    public function writeUint(IntegerSize $size, int $value): int
    {
        return match ($size)
        {
            IntegerSize::_8 => $this->writeUint8($value),
            IntegerSize::_16 => $this->writeUint16($value),
            IntegerSize::_32 => $this->writeUint32($value),
            IntegerSize::_64 => $this->writeUint64($value),
        };
    }

    public function writeSint8(int $value): int
    {
        return $this->writeBytes(pack('c', $value));
    }

    public function writeSint16(int $value): int
    {
        return $this->writeBytes(pack('s', $value));
    }

    public function writeSint32(int $value): int
    {
        return $this->writeBytes(pack('l', $value));
    }

    public function writeSint64(int $value): int
    {
        return $this->writeBytes(pack('q', $value));
    }

    public function writeSint(IntegerSize $size, int $value): int
    {
        return match ($size)
        {
            IntegerSize::_8 => $this->writeSint8($value),
            IntegerSize::_16 => $this->writeSint16($value),
            IntegerSize::_32 => $this->writeSint32($value),
            IntegerSize::_64 => $this->writeSint64($value),
        };
    }
}
