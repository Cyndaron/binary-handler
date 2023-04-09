<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler;

use RuntimeException;
use function assert;
use function fopen;
use function fread;
use function is_array;
use function ord;
use function unpack;

final class BinaryReader extends BinaryHandler
{
    public static function fromFile(string $filename): static
    {
        $fp = fopen($filename, 'rb');
        if ($fp === false)
        {
            throw new RuntimeException('Could not open file!');
        }
        return new self($fp, true);
    }

    public function readBytes(int $numBytes): string
    {
        assert($numBytes >= 0);
        $ret = @fread($this->fp, $numBytes);
        if ($ret === false)
        {
            throw new RuntimeException('Could not read data!');
        }
        return $ret;
    }

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
