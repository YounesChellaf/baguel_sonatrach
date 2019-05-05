<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Supplier;
use Illuminate\Support\Facades\Schema;
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
  public function boot(){
    date_default_timezone_set('Africa/Algiers');
    // Carbon::setLocale('fr_FR');
    Schema::defaultStringLength(191);
  }
}
