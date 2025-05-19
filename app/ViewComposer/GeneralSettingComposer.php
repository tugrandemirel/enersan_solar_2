<?php

namespace App\ViewComposer;

use App\Settings\GeneralSetting;
use Illuminate\View\View;

class GeneralSettingComposer
{
    public function compose(View $view): void
    {
        $general_setting = app(GeneralSetting::class);
        $view->with('general_setting', $general_setting);
    }
}
