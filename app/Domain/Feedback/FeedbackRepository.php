<?php

namespace App\Domain\Feedback;

interface FeedbackRepository
{
    public function store(Feedback $feedback): Feedback;
}
