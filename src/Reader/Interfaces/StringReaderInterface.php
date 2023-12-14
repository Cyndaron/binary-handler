<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Reader\Interfaces;

use Cyndaron\BinaryHandler\IntegerSize;

interface StringReaderInterface
{
    public function readStringWithLength(int $length): string;

    public function readNullTerminatedString(): string;

    public function readStringWithPrecedingLength(IntegerSize $lengthFieldSize): string;

    public function readNullTerminatedStringWithFixedLength(int $fieldLength): string;
}
