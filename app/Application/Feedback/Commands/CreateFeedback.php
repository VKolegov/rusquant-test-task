<?php

namespace App\Application\Feedback\Commands;

use App\Domain\Feedback\Feedback;
use App\Domain\Feedback\FeedbackRepository;
use App\Domain\Shared\Command;

class CreateFeedback implements Command
{
    private readonly FeedbackRepository $repository;

    public function __construct(
        private readonly Feedback $feedback
    )
    {
        $this->repository = app()->make(FeedbackRepository::class);
    }

    public function execute(): Feedback
    {
        return $this->repository->store(
            $this->feedback
        );
    }
}
