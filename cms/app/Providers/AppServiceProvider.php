<?php

namespace App\Providers;
use App\Models\CourtCat;
use App\Models\CaseType;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $courtCategory = CourtCat::all();
        view()->share('courtCategory', $courtCategory);

        $caseType = CaseType::all();
        view()->share('caseType', $caseType);
    }
}
