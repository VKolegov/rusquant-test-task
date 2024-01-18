<?php

namespace App\Application\Feedback\Repositories\File;

use App\Domain\Feedback\Feedback;
use App\Domain\Feedback\FeedbackRepository as FeedbackRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class FeedbackRepository implements FeedbackRepositoryInterface
{

    public function store(Feedback $feedback): Feedback
    {
        $filename = "{$feedback->createdAt->value()}_{$feedback->authorName}.txt";

        $content = "Дата: {$feedback->createdAt->value()}\n";
        $content .= "Email: $feedback->email\n";
        $content .= "Текст обращения: $feedback->text";

        Storage::put(
            "feedbacks/$filename",
            $content
        );

        return $feedback;
    }
}
