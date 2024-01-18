<?php

namespace App\Presentation\HTTP;

use App\Application\Feedback\Commands\CreateFeedback;
use App\Application\Feedback\Mappers\FeedbackMapper;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedbackController
{
    public function store(Request $r): Response
    {
        try {
            $feedbackData = FeedbackMapper::fromRequest($r);
            $feedback = (new CreateFeedback($feedbackData))->execute();

            return response()->json($feedback->toArray(), Response::HTTP_CREATED);
        } catch (\DomainException $domainException) {
            return response($domainException->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
