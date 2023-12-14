<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler;

use Cyndaron\BinaryHandler\Reader\Interfaces\BigEndianIntegerReaderInterface;
use Cyndaron\BinaryHandler\Reader\Interfaces\IntegerReaderInterface;
use Cyndaron\BinaryHandler\Reader\Interfaces\ReaderInterface;
use Cyndaron\BinaryHandler\Reader\Traits\BigEndianIntegerReaderTrait;
use Cyndaron\BinaryHandler\Reader\Traits\IntegerReaderTrait;
use Cyndaron\BinaryHandler\Reader\Traits\ReaderBaseTrait;
use Cyndaron\BinaryHandler\Shared\Traits\BinaryHandlerTrait;

final class BinaryReader implements ReaderInterface, IntegerReaderInterface, BigEndianIntegerReaderInterface
{
    use BinaryHandlerTrait;
    use ReaderBaseTrait;
    use IntegerReaderTrait;
    use BigEndianIntegerReaderTrait;
}
