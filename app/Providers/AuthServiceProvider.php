<?php

namespace App\Providers;

use App\Models\Authorization\Role;
use App\Models\Authorization\User;
use App\Models\FdwBioData;
use App\Models\Job;
use App\Policies\Authorization\UserPolicy;
use App\Policies\FdwBioDataPolicy;
use App\Policies\JobPolicy;
use App\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        FdwBioData::class => FdwBioDataPolicy::class,
        Job::class => JobPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
