<?php

namespace App\Providers;
use App\Models\CourtCat;
use App\Models\CaseType;
use App\Models\CaseR;
use App\Models\Law;
use App\Models\Jurisdriction;
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

        $pcase = CaseR::where('is_approved','Y')->get();
        view()->share('pcase', $pcase);
        $jrd = Jurisdriction::all();
        view()->share('jrd', $jrd);
        $law=Law::select('law_name')->distinct()->get();
        view()->share('law', $law);
        $section=Law::all();
        view()->share('section', $section);
        $tp = CaseR::all()->count();
        view()->share('tp', $tp);
        $ta = CaseR::where('is_approved','Y')->count();
        view()->share('ta', $ta);
    }
}
