<?php

return [
    'storage' => env('FEEDBACK_STORAGE_TYPE', \App\Application\Feedback\Repositories\FeedbackRepositoryType::File),
];
