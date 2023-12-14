<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Reader\Interfaces;

interface BigEndianIntegerReaderInterface
{
    public function readUint8BE(): int;

    public function readUint16BE(): int;

    public function readUint32BE(): int;

    public function readUint64BE(): int;
}
