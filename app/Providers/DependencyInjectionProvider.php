<?php

namespace ControlaNotas\Providers;

use Illuminate\Support\ServiceProvider;
use ControlaNotas\Domain\Repository\Table;
use ControlaNotas\Domain\Service;

class DependencyInjectionProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Service\ClienteService::class, function ($app) {
            return new Service\ClienteService(
                $app->make(Table\ClienteRepository::class)
            );
        });

        $this->app->bind(Service\ProdutoService::class, function ($app) {
            return new Service\ProdutoService(
                $app->make(Table\ProdutoRepository::class)
            );
        });

        $this->app->bind(Service\NotaService::class, function ($app) {
            return new Service\NotaService(
                $app->make(Table\NotaRepository::class)
            );
        });

        $this->app->bind(Service\NotaProdutoService::class, function ($app) {
            return new Service\NotaProdutoService(
                $app->make(Table\NotaProdutoRepository::class)
            );
        });
    }
}
