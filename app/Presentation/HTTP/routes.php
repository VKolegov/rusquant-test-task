<?php

use App\Presentation\HTTP\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::group(
    [
        'prefix' => 'feedbacks',
    ],
    static function () {
        Route::post('/', [FeedbackController::class, 'store']);
    }
);
