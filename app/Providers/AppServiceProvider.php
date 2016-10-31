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
      $colors = ['#2b3956', '#8d2232', '#3a9ed7', '#434949'];
      $category = ['full stack web development', 'tech', 'sports', 'anime', 'vacation', 'music'];
      $filters = ['web development', 'full stack', 'design', 'handmade', 'mysql5', 'laravel 5', 'ruby on rails', 'jekyll'];
      $latest = Lookup::where('category', 'blog')->orWhere('category', 'portfolio')->orderBy('date_posted', 'asc')->take(6)->get();
      $post = Lookup::where('category', 'blog')->orWhere('category', 'post')->orderBy('date_posted', 'asc')->first();
      $categories = Lookup::distinct()->where('category', 'blog')->orWhere('category', 'portfolio')->get(['sub_category']); //will provide distinct
      $languages = ['php', 'mysql', 'java', 'html', 'css', 'javascript', 'typescript', 'jquery', 'git', 'ruby', 'liquid', 'python', 'sml'];
      $frameworks = ['laravel5', 'nodejs', 'angular2', 'ruby on rails', 'lumen', 'hadoop', 'spark'];
      $skills = ['crud', 'cron', 'compression', 'scraping', 'data visualization', 'chartjs', 'instagram', 'twitter', 'twilio'];
      $jslibraries = ['chartsjs', 'isotope'];
      $workplaces = ['code for america', 'ufuzzy', 'source'];
      View::share('category', $category);
      View::share('categories', $categories);
      View::share('colors', $colors);
      View::share('recent', $post);
      View::share('latest', $latest);
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
