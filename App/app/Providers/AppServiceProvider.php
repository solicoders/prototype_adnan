<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            $this->loadMigrationsFrom(database_path('migrations/module'));
            $this->loadMigrationsFrom(database_path('migrations/competences'));
            $this->loadMigrationsFrom(database_path('migrations/user'));


    }
}
