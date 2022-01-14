<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private $providers = 'Modules/*/Providers/ModuleServiceProvider.php';
    private $provider = 'App\\Modules\\%s\\Providers\\ModuleServiceProvider';

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->getProviders()->each(function ($provider) {
            $this->app->register($provider);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);
    }

    private function getProviders()
    {
        $files = array_map(function ($file) {
            preg_match("/Modules\/(.*)\/Providers/", $file, $output);
            return sprintf($this->provider, $output[1]);
        }, glob(app_path($this->providers)));

        return new Collection($files);
    }
}
