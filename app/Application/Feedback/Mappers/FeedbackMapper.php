<?php

namespace App\Application\Feedback\Mappers;

use App\Domain\Feedback\Feedback;
use App\Domain\Feedback\ValueObjects\AuthorName;
use App\Domain\Feedback\ValueObjects\FeedbackText;
use App\Domain\Shared\ValueObject\Email;
use App\Infrastructure\Laravel\Models\FeedbackModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

    public static function fromEloquent(FeedbackModel $eloquentModel): Feedback
    {
        return new Feedback(
            authorName: new AuthorName($eloquentModel->author_name),
            email: new Email($eloquentModel->email),
            text: new FeedbackText($eloquentModel->text),
            id: $eloquentModel->ulid
        );
    }

    public static function toEloquent(Feedback $feedback): FeedbackModel
    {
        return new FeedbackModel([
            'author_name' => $feedback->authorName->__toString(),
            'email' => $feedback->email->__toString(),
            'text' => $feedback->text->__toString(),
            'created_at' => Carbon::parse($feedback->createdAt->raw()),
        ]);
    }
}
