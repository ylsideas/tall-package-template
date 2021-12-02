<?php

namespace VendorName\Skeleton;

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use VendorName\Skeleton\Components\AppLayout;
use VendorName\Skeleton\Console\InstallCommand;
use VendorName\Skeleton\Http\Livewire\Example;

class SkeletonServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('skeleton')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasCommand(InstallCommand::class)
            ->hasViewComponents('skeleton', AppLayout::class)
            ->hasMigration('create_skeleton_table');
    }

    /**
     * Get the LiveDash route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            'domain' => config('skeleton.domain', null),
            'prefix' => config('skeleton.path'),
            'middleware' => 'skeleton',
        ];
    }

    public function publishAppProvider()
    {
        $this->publishes([
            __DIR__ . '/ApplicationServiceProvider.php.stub' => app_path('Providers/SkeletonServiceProvider.php'),
        ], 'skeleton-provider');
    }

    public function loadLivewireComponents()
    {
        Livewire::component('example', Example::class);
    }

    public function loadRoutes()
    {
        Route::middlewareGroup('skeleton', config('skeleton.middleware', []));
        Route::group($this->routeConfiguration(), __DIR__ . '/Http/routes.php');
    }

    public function boot(): void
    {
        parent::boot();

        if ($this->app->runningInConsole()) {
            $this->publishAppProvider();
        }

        if (! config('skeleton.enabled')) {
            return;
        }

        $this->loadLivewireComponents();
        $this->loadRoutes();
    }
}
