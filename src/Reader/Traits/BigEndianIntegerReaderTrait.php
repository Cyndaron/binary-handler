<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Reader\Traits;

use function assert;
use function is_array;
use function ord;
use function unpack;

trait BigEndianIntegerReaderTrait
{
    public function readUint8BE(): int
    {
        return ord($this->readBytes(1));
    }

    public function readUint16BE(): int
    {
        $unpacked = unpack('n', $this->readBytes(2));
        assert(is_array($unpacked));
        return $unpacked[1];
    }

    public function readUint32BE(): int
    {
        $unpacked =  unpack('N', ($this->readBytes(4)));
        assert(is_array($unpacked));
        return $unpacked[1];
    }

    public function readUint64BE(): int
    {
        $unpacked =  unpack('J', ($this->readBytes(8)));
        assert(is_array($unpacked));
        return $unpacked[1];
    }
}
