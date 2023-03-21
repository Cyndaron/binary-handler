<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler;

use RuntimeException;
use function fseek;
use function fstat;
use function ftell;
use function is_array;
use function is_resource;
use function rewind;
use const SEEK_CUR;
use const SEEK_SET;
use function fclose;
use function fopen;
use function assert;
use function fwrite;

abstract class BinaryHandler
{
    /** @var resource */
    protected $fp;
    protected bool $closeOnDescruction;

    /**
     * @param resource $fp
     */
    final public function __construct($fp, bool $closeOnDestruction = false)
    {
        if (!is_resource($fp))
        {
            throw new RuntimeException('$fp must be a resource!');
        }
        $this->fp = $fp;
        $this->closeOnDescruction = $closeOnDestruction;
    }

    final public function __destruct()
    {
        if ($this->closeOnDescruction)
        {
            fclose($this->fp);
        }
    }

    final public function rewind(): void
    {
        rewind($this->fp);
    }

    final public function seek(int $bytes): void
    {
        fseek($this->fp, $bytes, SEEK_CUR);
    }

    final public function moveTo(int $position): void
    {
        fseek($this->fp, $position, SEEK_SET);
    }

    final public function getSize(): int
    {
        $stats = fstat($this->fp);
        assert(is_array($stats));
        return (int)($stats['size']);
    }

    final public function getPosition(): int
    {
        $pos = ftell($this->fp);
        assert($pos !== false);
        return $pos;
    }

    final public static function fromString(string $input): static
    {
        $fp = fopen('php://memory', 'rwb+');
        assert($fp !== false);
        fwrite($fp, $input);
        rewind($fp);
        return new static($fp, true);
    }

    abstract public static function fromFile(string $filename): static;
}
