<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Group' => 'App\Policies\GroupPolicy',
        'App\Page'  => 'App\Policies\PagePolicy',
        'App\User'  => 'App\Policies\UserPolicy',
        'App\Site'  => 'App\Policies\SitePolicy',
        'App\SellerPay'  => 'App\Policies\SellerPayPolicy'
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}
