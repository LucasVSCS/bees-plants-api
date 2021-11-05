<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\BeeInterface',
            'App\Repositories\Api\BeeApiRepository'
        );

        $this->app->bind(
            'App\Interfaces\PlantInterface',
            'App\Repositories\Api\PlantApiRepository'
        );
    }
}
