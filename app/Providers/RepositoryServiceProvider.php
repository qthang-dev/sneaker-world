<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Role;
use App\Repositories\Eloquent\EloquentRoleRepository;
use App\Repositories\RoleRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoleRepository::class, function(){
            return new EloquentRoleRepository(new Role());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
