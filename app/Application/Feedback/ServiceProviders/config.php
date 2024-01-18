<?php

use App\Application\Feedback\Repositories\FeedbackRepositoryType;

return [
    'storage' => env('FEEDBACK_STORAGE_TYPE', FeedbackRepositoryType::File),
];
