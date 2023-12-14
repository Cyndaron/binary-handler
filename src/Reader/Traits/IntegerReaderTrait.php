<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Reader\Traits;

use Cyndaron\BinaryHandler\IntegerSize;
use function assert;
use function is_array;
use function ord;
use function unpack;

trait IntegerReaderTrait
{
    public function readUint8(): int
    {
        return ord($this->readBytes(1));
    }

    public function readUint16(): int
    {
        $unpacked = unpack('v', $this->readBytes(2));
        assert(is_array($unpacked));
        return $unpacked[1];
    }

    public function readUint32(): int
    {
        $unpacked =  unpack('V', ($this->readBytes(4)));
        assert(is_array($unpacked));
        return $unpacked[1];
    }

    public function readUint64(): int
    {
        $unpacked =  unpack('P', ($this->readBytes(8)));
        assert(is_array($unpacked));
        return $unpacked[1];
    }

    public function readUint(IntegerSize $size): int
    {
        return match ($size)
        {
            IntegerSize::_8 => $this->readUint8(),
            IntegerSize::_16 => $this->readUint16(),
            IntegerSize::_32 => $this->readUint32(),
            IntegerSize::_64 => $this->readUint64(),
        };
    }

    public function readSint8(): int
    {
        $unpacked = unpack('c', ($this->readBytes(1)));
        assert(is_array($unpacked));
        return $unpacked[1];
    }

    public function readSint16(): int
    {
        $unpacked = unpack('s', ($this->readBytes(2)));
        assert(is_array($unpacked));
        return $unpacked[1];
    }

    public function readSint32(): int
    {
        $unpacked = unpack('l', ($this->readBytes(4)));
        assert(is_array($unpacked));
        return $unpacked[1];
    }

    public function readSint64(): int
    {
        $unpacked = unpack('q', ($this->readBytes(8)));
        assert(is_array($unpacked));
        return $unpacked[1];
    }

    public function readSint(IntegerSize $size): int
    {
        return match ($size)
        {
            IntegerSize::_8 => $this->readSint8(),
            IntegerSize::_16 => $this->readSint16(),
            IntegerSize::_32 => $this->readSint32(),
            IntegerSize::_64 => $this->readSint64(),
        };
    }
}
