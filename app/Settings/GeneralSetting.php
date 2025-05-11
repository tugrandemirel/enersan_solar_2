<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSetting extends Settings
{
    public ?string $site_name;

    public ?string $slogan = null;
    public ?string $url = null;
    public ?array $logo = null;
    public ?bool $is_active = null;
    public static function group(): string
    {
        return 'general_setting';
    }

    public function getLogoImage(): string
    {
        return !is_null($this->logo) ? asset($this->logo['path']) : "https://ui-avatars.com/api/?name=$this->site_name&background=random&color=fff";
    }
}
