<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    // ...existing code...

    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
