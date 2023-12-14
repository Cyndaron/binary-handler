<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Reader\Traits;

use RuntimeException;
use function assert;
use function fopen;
use function fread;

trait ReaderBaseTrait
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
        if ($numBytes === 0)
        {
            return '';
        }
        $ret = @fread($this->fp, $numBytes);
        if ($ret === false)
        {
            throw new RuntimeException('Could not read data!');
        }
        return $ret;
    }
}
