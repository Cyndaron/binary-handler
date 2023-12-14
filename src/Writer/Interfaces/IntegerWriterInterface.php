<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Writer\Interfaces;

use Cyndaron\BinaryHandler\IntegerSize;

interface IntegerWriterInterface
{
    public function writeUint8(int $value): int;

    public function writeUint16(int $value): int;

    public function writeUint32(int $value): int;

    public function writeUint64(int $value): int;

    public function writeUint(IntegerSize $size, int $value): int;

    public function writeSint8(int $value): int;

    public function writeSint16(int $value): int;

    public function writeSint32(int $value): int;

    public function writeSint64(int $value): int;

    public function writeSint(IntegerSize $size, int $value): int;
}
