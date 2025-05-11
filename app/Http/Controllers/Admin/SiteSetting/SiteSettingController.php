<?php

namespace App\Http\Controllers\Admin\SiteSetting;

use App\Http\Controllers\Controller;
use App\Settings\ContactSetting;
use App\Settings\GeneralSetting;
use App\Settings\SocialMediaSetting;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class SiteSettingController extends Controller
{
    private const PATH = 'admin.site-setting.';

    /**
     * Display a listing of the resource.
     */
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $general_setting = app(GeneralSetting::class);
        $contact_setting = app(ContactSetting::class);
        $social_medias = app(SocialMediaSetting::class);

        return view(self::PATH.'index', compact('general_setting', 'contact_setting', 'social_medias'));
    }
}
