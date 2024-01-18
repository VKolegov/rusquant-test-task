<?php

namespace App\Application\Feedback\Mappers;

use App\Domain\Feedback\Feedback;
use App\Domain\Feedback\ValueObjects\FeedbackText;
use App\Domain\Feedback\ValueObjects\AuthorName;
use App\Domain\Shared\ValueObject\Email;
use Illuminate\Http\Request;

class FeedbackMapper
{
    public static function fromRequest(Request $request): Feedback
    {
        return new Feedback(
            authorName: new AuthorName($request->string('name')),
            email: new Email($request->string('email')),
            text: new FeedbackText($request->string('text')),
        );
    }

}
