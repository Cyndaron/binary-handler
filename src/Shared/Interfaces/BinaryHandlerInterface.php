<?php
declare(strict_types=1);

namespace Cyndaron\BinaryHandler\Shared\Interfaces;

interface BinaryHandlerInterface
{
    public function rewind(): void;

    public function seek(int $bytes): void;

    public function moveTo(int $position): void;

    public function getSize(): int;

    public function getPosition(): int;

    public static function fromString(string $input): self;

    public static function fromFile(string $filename): self;
}
