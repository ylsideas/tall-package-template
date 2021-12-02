<?php

namespace VendorName\Skeleton\Tests\Support;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use VendorName\Skeleton\Skeleton;

class InstalledServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->authorization();
    }

    protected function authorization(): void
    {
        $this->gate();

        Skeleton::auth(function ($request) {
            return app()->environment('local') ||
                Gate::check('viewSkeleton', [$request->user()]);
        });
    }

    protected function gate(): void
    {
        Gate::define('viewSkeleton', function ($user) {
            return true;
        });
    }
}
