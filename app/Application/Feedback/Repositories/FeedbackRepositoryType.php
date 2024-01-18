<?php

namespace App\Application\Feedback\Repositories;

enum FeedbackRepositoryType: string
{
    case Eloquent = 'eloquent';
    case Email = 'email';
    case File = 'file';
}
