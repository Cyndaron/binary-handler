<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler;

enum IntegerSize : int
{
    case _8 = 1;
    case _16 = 2;
    case _32 = 4;
    case _64 = 8;
}
