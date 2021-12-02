<?php

namespace VendorName\Skeleton\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Illuminate\Support\Facades\File;
use Livewire\LivewireServiceProvider;
use NunoMaduro\LaravelMojito\MojitoServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use VendorName\Skeleton\SkeletonServiceProvider;
use VendorName\Skeleton\Tests\Support\InstalledServiceProvider;

class TestCase extends Orchestra
{
    use InteractsWithViews;

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'VendorName\\Skeleton\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function copyAssets()
    {
        File::copyDirectory(__DIR__ . '/../resources/dist', public_path('/vendor/skeleton'));
    }

    protected function cleanAssets()
    {
        File::deleteDirectory(public_path('/vendor/skeleton'));
    }

    protected function getPackageProviders($app)
    {
        return [
            MojitoServiceProvider::class,
            LivewireServiceProvider::class,
            SkeletonServiceProvider::class,
            InstalledServiceProvider::class,
        ];
    }

    public function ignorePackageDiscoveriesFrom()
    {
        return [];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_skeleton_table.php.stub';
        $migration->up();
        */
    }
}
