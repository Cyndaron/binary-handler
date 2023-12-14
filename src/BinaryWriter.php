<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler;

use Cyndaron\BinaryHandler\Writer\Interfaces\BigEndianIntegerWriterInterface;
use Cyndaron\BinaryHandler\Writer\Interfaces\IntegerWriterInterface;
use Cyndaron\BinaryHandler\Writer\Traits\BigEndianIntegerWriterTrait;
use Cyndaron\BinaryHandler\Writer\Traits\IntegerWriterTrait;
use Cyndaron\BinaryHandler\Writer\Traits\WriterBaseTrait;

final class BinaryWriter extends BinaryHandler implements IntegerWriterInterface, BigEndianIntegerWriterInterface
{
    use WriterBaseTrait;
    use IntegerWriterTrait;
    use BigEndianIntegerWriterTrait;
}
