<?php

namespace App\Providers;

use App\Models\Lesson;
use App\Observers\LessonOberver;
use Illuminate\Support\Facades\Blade;
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
        Lesson::observe(LessonOberver::class);
        Blade::directive('tabIs', function ($expression) {
            return "<?php if(Request::url() === route($expression)): ?>";
        });
    }
}
