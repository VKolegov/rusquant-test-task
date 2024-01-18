<?php

namespace App\Domain\Shared;

abstract class AggregateRoot
{
    abstract public function toArray(): array;
}
