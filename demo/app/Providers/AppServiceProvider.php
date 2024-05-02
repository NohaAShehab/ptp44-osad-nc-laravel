<?php

namespace App\Providers;

use App\Policies\TrackPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Track;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // add service --> GATe --> only track creator can edit / delete it ??
        Gate::define('track_update_delete', function (User $user, Track $track) {
            return $user->id === $track->owner_id;
        });

        # register policy class to the model
        Gate::policy(Track::class, TrackPolicy::class);

    }
}
