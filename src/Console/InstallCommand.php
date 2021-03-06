<?php

namespace VendorName\Skeleton\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'skeleton:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the :package_name resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Publishing Skeleton Service Provider...');
        $this->callSilent('vendor:publish', ['--tag' => 'skeleton-provider']);

        $this->comment('Publishing Skeleton Assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'skeleton-assets']);

        $this->comment('Publishing Skeleton Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'skeleton-config']);

        $this->registerSkeletonServiceProvider();

        $this->info('Skeleton scaffolding installed successfully.');
    }

    /**
     * Register the PackageName service provider in the application configuration file.
     *
     * @return void
     */
    protected function registerSkeletonServiceProvider()
    {
        $namespace = Str::replaceLast('\\', '', $this->laravel->getNamespace());

        $appConfig = file_get_contents(config_path('app.php'));

        if (Str::contains($appConfig, $namespace . '\\Providers\\SkeletonServiceProvider::class')) {
            return;
        }

        $lineEndingCount = [
            "\r\n" => substr_count($appConfig, "\r\n"),
            "\r" => substr_count($appConfig, "\r"),
            "\n" => substr_count($appConfig, "\n"),
        ];

        $eol = array_keys($lineEndingCount, max($lineEndingCount))[0];

        file_put_contents(
            config_path('app.php'),
            str_replace(
                "{$namespace}\\Providers\RouteServiceProvider::class," . $eol,
                "{$namespace}\\Providers\RouteServiceProvider::class," . $eol . "        {$namespace}\Providers\SkeletonServiceProvider::class," . $eol,
                $appConfig
            )
        );

        file_put_contents(
            app_path('Providers/SkeletonServiceProvider.php'),
            str_replace(
                "namespace App\Providers;",
                "namespace {$namespace}\Providers;",
                file_get_contents(app_path('Providers/SkeletonServiceProvider.php'))
            )
        );
    }
}
