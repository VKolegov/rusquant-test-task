<?php

namespace App\Application\Feedback\Repositories;

use App\Application\Feedback\Repositories\Eloquent\FeedbackRepository as FeedbackEloquentRepository;
use App\Application\Feedback\Repositories\File\FeedbackRepository as FeedbackFileRepository;
use App\Domain\Feedback\FeedbackRepository;

class FeedbackRepositoryFactory
{
    public static function new(FeedbackRepositoryType $type): FeedbackRepository
    {
        return match ($type) {
            FeedbackRepositoryType::Eloquent => new FeedbackEloquentRepository(),

            default => new FeedbackFileRepository(),
        };
    }
}
