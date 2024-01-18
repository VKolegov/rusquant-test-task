<?php

namespace App\Domain\Feedback;

use App\Domain\Feedback\ValueObjects\FeedbackText;
use App\Domain\Feedback\ValueObjects\AuthorName;
use App\Domain\Shared\AggregateRoot;
use App\Domain\Shared\ValueObject\DateTime;
use App\Domain\Shared\ValueObject\Email;

class Feedback extends AggregateRoot
{
    public function __construct(
        public readonly AuthorName   $authorName,
        public readonly Email        $email,
        public readonly FeedbackText $text,
        public ?DateTime             $createdAt = null
    )
    {

        if (!$this->createdAt) {
            $this->createdAt = DateTime::now();
        }
    }

    public function toArray(): array
    {
        return [
            'name' => $this->authorName->__toString(),
            'email' => $this->email->__toString(),
            'text' => $this->text->__toString(),
            'created_at' => $this->createdAt->value(),
        ];
    }
}
