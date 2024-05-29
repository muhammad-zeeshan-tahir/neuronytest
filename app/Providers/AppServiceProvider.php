<?php

namespace App\Providers;

use App\Interfaces\Candidate\CandidateServiceInterface;
use App\Services\Candidate\CandidateService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CandidateServiceInterface::class, CandidateService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        return [
            CandidateServiceInterface::class => CandidateService::class
        ];
    }
}
