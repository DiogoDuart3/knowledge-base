<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('admin', function ($expression) {
            return "<?php if (Auth::check() && Auth::user()->isAdmin()) : ?>";
        });

        Blade::directive('endadmin', function ($expression) {
            return '<?php endif; ?>';
        });
    }
}
