<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Shared\Traits;

use RuntimeException;
use function assert;
use function fclose;
use function fopen;
use function fseek;
use function fstat;
use function ftell;
use function fwrite;
use function is_array;
use function is_resource;
use function rewind;
use const SEEK_CUR;
use const SEEK_SET;

trait BinaryHandlerTrait
{
    /** @var resource */
    private $fp;
    private bool $closeOnDestruction;

    /**
     * @param resource $fp
     */
    public function __construct($fp, bool $closeOnDestruction = false)
    {
        if (!is_resource($fp))
        {
            throw new RuntimeException('$fp must be a resource!');
        }
        $this->fp = $fp;
        $this->closeOnDestruction = $closeOnDestruction;
    }

    public function __destruct()
    {
        if ($this->closeOnDestruction)
        {
            fclose($this->fp);
        }
    }

    public function rewind(): void
    {
        rewind($this->fp);
    }

    public function seek(int $bytes): void
    {
        fseek($this->fp, $bytes, SEEK_CUR);
    }

    public function moveTo(int $position): void
    {
        fseek($this->fp, $position, SEEK_SET);
    }

    public function getSize(): int
    {
        $stats = fstat($this->fp);
        assert(is_array($stats));
        return (int)($stats['size']);
    }

    public function getPosition(): int
    {
        $pos = ftell($this->fp);
        assert($pos !== false);
        return $pos;
    }

    public static function fromString(string $input): self
    {
        $fp = fopen('php://memory', 'rwb+');
        assert($fp !== false);
        fwrite($fp, $input);
        rewind($fp);
        return new self($fp, true);
    }
}
