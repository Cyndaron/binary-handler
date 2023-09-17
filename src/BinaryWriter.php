<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler;

use RuntimeException;
use function fopen;
use function fwrite;
use function pack;

final class BinaryWriter extends BinaryHandler
{
    public static function fromFile(string $filename): static
    {
        $fp = fopen($filename, 'wb');
        if ($fp === false)
        {
            throw new RuntimeException('Could not open file!');
        }
        return new self($fp, true);
    }

    public function writeBytes(string $bytes): int
    {
        $ret = @fwrite($this->fp, $bytes);
        if ($ret === false)
        {
            throw new RuntimeException('Could not write data!');
        }
        return $ret;
    }

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
