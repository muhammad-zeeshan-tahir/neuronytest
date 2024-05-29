<?php

namespace App\Providers;

use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Candidate\CandidateRepositoryEloquent;
use App\Repositories\Company\CompanyRepository;
use App\Repositories\Company\CompanyRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register Repositories.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CandidateRepository::class, CandidateRepositoryEloquent::class);
        $this->app->bind(CompanyRepository::class, CompanyRepositoryEloquent::class);
    }

    /**
     * Bootstrap repositories.
     *
     * @return void
     */
    public function boot()
    {
        return [
            CandidateRepository::class => CandidateRepository::class,
            CompanyRepository::class => CompanyRepositoryEloquent::class,
        ];
        //:end-bindings:
    }
}
