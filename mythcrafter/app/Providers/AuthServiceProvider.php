<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;  // make sure to import Gate

use App\Models\Character;
use App\Policies\CharacterPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Character::class => CharacterPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        // Определяем правило admin
        // Define the 'admin' rule
        Gate::define('admin', function ($user) {
            return $user->role === 'admin';
        });
    }
}
