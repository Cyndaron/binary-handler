<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Writer\Interfaces;

interface BigEndianIntegerWriterInterface
{
    public function writeUint8BE(int $value): int;

    public function writeUint16BE(int $value): int;

    public function writeUint32BE(int $value): int;

    public function writeUint64BE(int $value): int;
}
