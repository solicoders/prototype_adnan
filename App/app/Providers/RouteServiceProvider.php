<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Filesystem\Filesystem;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        // Dynamically load routes from subdirectories
        $this->mapSubdirectoryRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }

    /**
     * Dynamically load routes from subdirectories.
     *
     * @return void
     */
    protected function mapSubdirectoryRoutes()
    {
        $filesystem = new Filesystem();

        $routePath = base_path('routes');

        // Get all subdirectories in the routes directory
        $directories = $filesystem->directories($routePath);

        foreach ($directories as $directory) {
            $routeFiles = $filesystem->files($directory);

            foreach ($routeFiles as $file) {
                // Load routes from each file within the subdirectory
                Route::middleware('web')
                    ->group($file->getPathname());
            }
        }
    }
}
