<?php

namespace App\Domain\Feedback\ValueObjects;

use App\Domain\Shared\Exception\RequiredException;
use App\Domain\Shared\Exception\TextTooLong;
use App\Domain\Shared\Exception\TextTooShort;
use App\Domain\Shared\ValueObject\ValueObject;

class FeedbackText extends ValueObject
{

    private readonly string $value;

    public const MIN_LENGTH = 16;
    public const MAX_LENGTH = 65536;

    public function __construct(string $feedbackText)
    {

        if (empty($feedbackText)) {
            throw new RequiredException('text');
        }

        if (strlen($feedbackText) < self::MIN_LENGTH) {
            throw new TextTooShort('text', self::MIN_LENGTH);
        }

        if (strlen($feedbackText) > self::MAX_LENGTH) {
            throw new TextTooLong('text', self::MAX_LENGTH);
        }

        $this->value = $feedbackText;
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
