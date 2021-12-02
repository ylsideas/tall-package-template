<?php

namespace VendorName\Skeleton;

trait AuthorizesRequests
{
    /**
     * The callback that should be used to authenticate Dashboard users.
     *
     * @var \Closure
     */
    public static \Closure $authUsing;

    /**
     * Register the Dashboard authentication callback.
     *
     * @param  \Closure  $callback
     * @return static
     */
    public static function auth($callback): static
    {
        static::$authUsing = $callback;

        return new static();
    }

    /**
     * Determine if the given request can access the dashboard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    public static function check($request): bool
    {
        return (static::$authUsing ?: function () {
            return app()->environment('local');
        })($request);
    }
}
