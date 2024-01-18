<?php

namespace App\Domain\Feedback\ValueObjects;

use App\Domain\Shared\ValueObject\ValueObject;

final class AuthorName extends ValueObject
{
    private ?string $value;

    public function __construct(?string $name)
    {
        $this->value = $name;
    }

    public function __toString(): string
    {
        return (string) $this->value;
    }

    public function jsonSerialize(): ?string
    {
        return $this->value;
    }
}
