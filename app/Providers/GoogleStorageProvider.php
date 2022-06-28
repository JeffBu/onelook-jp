<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Google\Cloud\Storage\StorageClient;
use League\Flysystem\FileSystem;
use Superbalist\Flysystem\GoogleStorage\GoogleStorageAdapter;

class GoogleStorageProvider extends ServiceProvider
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
        \Storage::extend('gcs', function($app, $config) {
            $storageClient = new StorageClient([
                'project_id' => $config['project_id'],
                'keyFilePath' => $config['key_file'],
            ]);

            $bucket = $storageClient->bucket($config['bucket']);

            $adapter = new GoogleStorageAdapter($storageClient, $bucket);

            return new FileSystem($adapter);
        });
    }
}
