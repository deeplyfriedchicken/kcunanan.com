<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Lookup;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $colors = ['ish-color9 ish-text-color6', 'ish-color8 ish-text-color3', 'ish-color3 ish-text-color9', 'ish-color10 ish-text-color6'];
      $category = ['coding', 'tech', 'sports', 'anime', 'vacation', 'music'];
      $post = Lookup::where('category', 'blog')->orWhere('category', 'post')->orderBy('date_posted', 'asc')->first();
      View::share('category', $category);
      View::share('colors', $colors);
      View::share('recent', $post);
      \Illuminate\Pagination\LengthAwarePaginator::defaultView('partials.paginator');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
