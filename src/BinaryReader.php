<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler;

use Cyndaron\BinaryHandler\Reader\Interfaces\BigEndianIntegerReaderInterface;
use Cyndaron\BinaryHandler\Reader\Interfaces\IntegerReaderInterface;
use Cyndaron\BinaryHandler\Reader\Traits\BigEndianIntegerReaderTrait;
use Cyndaron\BinaryHandler\Reader\Traits\IntegerReaderTrait;
use Cyndaron\BinaryHandler\Reader\Traits\ReaderBaseTrait;

final class BinaryReader extends BinaryHandler implements IntegerReaderInterface, BigEndianIntegerReaderInterface
{
    use ReaderBaseTrait;
    use IntegerReaderTrait;
    use BigEndianIntegerReaderTrait;
}
