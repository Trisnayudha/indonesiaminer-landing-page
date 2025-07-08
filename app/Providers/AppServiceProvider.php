<?php

namespace App\Providers;

use App\Extensions\MirroringLocalFilesystemAdapter;
use Carbon\Carbon;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

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
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        Storage::extend('mirrored', function ($app, $config) {
            $adapter = new MirroringLocalFilesystemAdapter(storage_path('app'));
            return new Filesystem($adapter);
        });
    }
}
