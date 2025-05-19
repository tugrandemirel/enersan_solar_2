<?php

namespace App\ViewComposer;

use App\Settings\GeneralSetting;
use App\Settings\SocialMediaSetting;
use Illuminate\View\View;

class SocialMediaSettingComposer
{
    public function compose(View $view): void
    {
        $social_media = app(SocialMediaSetting::class);
        $view->with('social_media', $social_media);
    }
}
