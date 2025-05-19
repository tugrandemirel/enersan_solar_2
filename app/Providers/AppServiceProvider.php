<?php

namespace App\Providers;

use App\ViewComposer\ContactSettingComposer;
use App\ViewComposer\GeneralSettingComposer;
use App\ViewComposer\SocialMediaSettingComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer([
            "admin.layouts.app",
            "front.layouts.header",
        ], GeneralSettingComposer::class);

        View::composer([
            "front.layouts.header",
        ], SocialMediaSettingComposer::class);

        View::composer([
            "front.layouts.header",
            "front.index",
            "front.service.show",
            "front.project.show",
            "front.contact.index",
        ], ContactSettingComposer::class);
    }
}
