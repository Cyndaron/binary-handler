<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Reader\Traits;

use Cyndaron\BinaryHandler\IntegerSize;
use function strpos;
use function substr;

trait StringReaderTrait
{
    public function readStringWithLength(int $length): string
    {
        return $this->readBytes($length);
    }

    public function readNullTerminatedString(): string
    {
        $ret = '';
        while (true)
        {
            $char = $this->readBytes(1);
            if ($char === "\x00")
            {
                break;
            }

            $ret .= $char;
        }

        return $ret;
    }

    public function readStringWithPrecedingLength(IntegerSize $lengthFieldSize): string
    {
        $length = $this->readUint($lengthFieldSize);
        return $this->readStringWithLength($length);
    }

    public function readNullTerminatedStringWithFixedLength(int $fieldLength): string
    {
        $string = $this->readStringWithLength($fieldLength);
        $nullPos = strpos($string, "\x00");
        if ($nullPos === false)
        {
            return $string;
        }

        return substr($string, 0, $nullPos);
    }
}
