<?php

namespace ZeroByteD\SocialiteEsvoe;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;

class SocialiteEsvoeServiceProvider extends ServiceProvider
{
    /**
     * @throws BindingResolutionException
     */
    public function boot()
    {
        $socialite = $this->app->make(Factory::class);

        $socialite->extend('esvoe', function () use ($socialite) {
            $config = config('services.esvoe');

            return $socialite->buildProvider(SocialiteEsvoeProvider::class, $config);
        });
    }
}