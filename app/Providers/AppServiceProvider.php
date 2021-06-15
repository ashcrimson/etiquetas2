<?php

namespace App\Providers;

use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\SampleChart::class,
            \App\Charts\ChartIngresosDia::class,
            \App\Charts\ChartIngresosMes::class,
            \App\Charts\ChartIngresosPorCategoria::class,
        ]);
    }
}
