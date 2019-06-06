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
        Blade::directive('admin', function() {
            $condition = false;
            if(Auth::user()) $condition = Auth::user()->isAdmin();
            return "<?php if ($condition) : ?>";
        });
        Blade::directive('endadmin', function() {
            return "<?php endif; ?>";
        });
    }
}
