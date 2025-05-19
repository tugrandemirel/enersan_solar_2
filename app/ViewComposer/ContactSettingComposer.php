<?php

namespace App\ViewComposer;

use App\Settings\ContactSetting;
use App\Settings\GeneralSetting;
use App\Settings\SocialMediaSetting;
use Illuminate\View\View;

class ContactSettingComposer
{
    public function compose(View $view): void
    {
        $contact = app(ContactSetting::class);
        $view->with('contact', $contact);
    }
}
