<?php

namespace App\Application\Feedback\Repositories\Eloquent;

use App\Application\Feedback\Mappers\FeedbackMapper;
use App\Domain\Feedback\Feedback;
use App\Domain\Feedback\FeedbackRepository as FeedbackRepositoryInterface;

class FeedbackRepository implements FeedbackRepositoryInterface
{

    public function store(Feedback $feedback): Feedback
    {
        $eloquentModel = FeedbackMapper::toEloquent($feedback);

        $eloquentModel->save();

        return FeedbackMapper::fromEloquent($eloquentModel);
    }
}
