<?php

namespace ControlaNotas\Providers;

use Illuminate\Support\ServiceProvider;
//use ControlaNotas\Domain\Repository\Table\;
//use ControlaNotas\Domain\Service\;

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
//        $this->app->bind(Service\OrdemServicoService::class, function ($app) {
//            return new Service\OrdemServicoService(
//                $app->make(Table\OrdemServicoRepository::class),
//                $app->make(Table\AcessorioFilialRepository::class),
//                $app->make(Service\OrdemServicoParcelaService::class),
//                $app->make(Service\OrdemServicoAcessorioService::class)
//            );
//        });


    }
}
