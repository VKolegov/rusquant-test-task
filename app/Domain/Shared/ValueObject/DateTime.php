<?php

declare(strict_types=1);

namespace App\Domain\Shared\ValueObject;

use DateTimeImmutable;
use DateTimeZone;

final class DateTime extends ValueObject implements DateTimeInterface
{

    public function __construct(private readonly DateTimeImmutable $dateTime)
    {

    }

    public function raw(): DateTimeImmutable
    {
        return $this->dateTime;
    }

    public function value(): string
    {
        return $this
            ->dateTime
            ->setTimezone(new DateTimeZone(static::DATETIME_ZONE))
            ->format(static::DATETIME_FORMAT);
    }

    public static function fromString(string $datetime): static
    {
        return new static(
            new DateTimeImmutable($datetime),
        );
    }

    public static function now(): static
    {
        return new static(
            new DateTimeImmutable('now'),
        );
    }

    public function __toString(): string
    {
        $this->value();
    }

    public function jsonSerialize(): string
    {
        return $this->value();
    }
}
