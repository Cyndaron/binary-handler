<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler;

use Cyndaron\BinaryHandler\Shared\Traits\BinaryHandlerTrait;
use Cyndaron\BinaryHandler\Writer\Interfaces\BigEndianIntegerWriterInterface;
use Cyndaron\BinaryHandler\Writer\Interfaces\IntegerWriterInterface;
use Cyndaron\BinaryHandler\Writer\Interfaces\WriterInterface;
use Cyndaron\BinaryHandler\Writer\Traits\BigEndianIntegerWriterTrait;
use Cyndaron\BinaryHandler\Writer\Traits\IntegerWriterTrait;
use Cyndaron\BinaryHandler\Writer\Traits\WriterBaseTrait;

final class BinaryWriter implements WriterInterface, IntegerWriterInterface, BigEndianIntegerWriterInterface
{
    use BinaryHandlerTrait;
    use WriterBaseTrait;
    use IntegerWriterTrait;
    use BigEndianIntegerWriterTrait;
}
