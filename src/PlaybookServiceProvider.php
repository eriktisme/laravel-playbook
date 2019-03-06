<?php

namespace Scaling\Playbook;

use Illuminate\Support\ServiceProvider;
use Scaling\Playbook\Console\MakePlaybookCommand;
use Scaling\Playbook\Console\PlaybookCommand;

class PlaybookServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-playbook.php'),
            ], 'config');

            $this->commands([
                PlaybookCommand::class,
                MakePlaybookCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-playbook');
    }
}
