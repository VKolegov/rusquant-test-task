<?php

namespace App\Application\Feedback\ServiceProviders;

use App\Application\Feedback\Repositories\FeedbackRepositoryFactory;
use App\Application\Feedback\Repositories\FeedbackRepositoryType;
use App\Domain\Feedback\FeedbackRepository;
use Illuminate\Support\ServiceProvider;

class FeedbackServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->mergeConfigFrom(
            __DIR__ . '/config.php', 'feedback'
        );


        $this->app->bind(
            FeedbackRepository::class,

            fn() => FeedbackRepositoryFactory::new(
                FeedbackRepositoryType::from(config('feedback.storage')),
            )
        );
    }
}
