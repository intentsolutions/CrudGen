<?php

namespace IS\CrudMaker;

use IS\CrudMaker\Commands\MakeCrud;
use IS\CrudMaker\Maker\Interfaces\MakerFactoryInterface;
use IS\CrudMaker\Maker\Interfaces\PropertyContainerInterface;
use IS\CrudMaker\Maker\MakerFactory;
use IS\CrudMaker\Maker\PropertyContainer;
use Illuminate\Support\ServiceProvider;

class CrudMakerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind('make:crud', function ($app) {
            return new MakeCrud();
        });
        $this->commands([
            'make:crud'
        ]);

        $this->publishes([
            __DIR__ . '/Publishes/Filters/BaseFilters.php' => base_path('app/Filters/BaseFilters.php'),
            __DIR__ . '/Publishes/Filters/Filterable.php' => base_path('app/Filters/Filterable.php'),
            __DIR__ . '/Publishes/Repositories/BaseRepository.php' => base_path('app/Repositories/BaseRepository.php'),
        ], 'crudMaker');

        $this->app->bind(MakerFactoryInterface::class, MakerFactory::class);

        $this->app->singleton(PropertyContainerInterface::class, PropertyContainer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'crudMaker.php', 'crudMaker'
        );
    }

}
