<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Reader\Interfaces;

use Cyndaron\BinaryHandler\IntegerSize;

interface IntegerReaderInterface
{
    public function readUint8(): int;

    public function readUint16(): int;

    public function readUint32(): int;

    public function readUint64(): int;

    public function readUint(IntegerSize $size): int;

    public function readSint8(): int;

    public function readSint16(): int;

    public function readSint32(): int;

    public function readSint64(): int;

    public function readSint(IntegerSize $size): int;
}
