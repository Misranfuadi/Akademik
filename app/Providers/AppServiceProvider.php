<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

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
        $halaman = '';
        if (Request::segment(1) == 'siswa') {
            $halaman = 'siswa';
        }
        if (Request::segment(1) == 'kelas') {
            $halaman = 'kelas';
        }
        if (Request::segment(1) == 'hobi') {
            $halaman = 'hobi';
        }
        if (Request::segment(1) == 'about') {
            $halaman = 'about';
        }
        view()->share('halaman', $halaman);
    }
}
