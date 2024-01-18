<?php

namespace App\Domain\Shared\ValueObject;

use App\Domain\Shared\Exception\IncorrectEmailFormatException;
use App\Domain\Shared\Exception\RequiredException;

final class Email extends ValueObject
{
    private readonly string $value;

    public function __construct(string $email)
    {
        if (empty($email)) {
            throw new RequiredException('email');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new IncorrectEmailFormatException();
        }

        $this->value = $email;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function jsonSerialize(): string
    {
        return $this->value;
    }
}
