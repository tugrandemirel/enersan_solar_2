<?php

namespace App\Http\Controllers\Admin\SiteSetting;

use App\Helper\FileHelper;
use App\Helpers\Response\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiteSetting\GeneralSettingRequest;
use App\Settings\GeneralSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class GeneralSettingController extends Controller
{
    public function store(GeneralSettingRequest $request): JsonResponse
    {
        $attributes = collect($request->validated());

        try {
            $general_setting = new GeneralSetting();

            if ($request->hasFile("logo")) {
                $logo = FileHelper::updateFile($attributes->get('logo'), $general_setting->logo['path'] ?? null);

                $general_setting->logo = [
                    'image_name' => $logo['file_name'],
                    'image_ext' => $logo['file_ext'],
                    'size' => $logo['size'],
                    'path' => $logo['path'],
                    'width' => $logo['width'],
                    'height' => $logo['height'],
                    'mime_type' => $logo['mime_type'],
                ];
            }

            if ($request->hasFile("favicon")) {
                $favicon = FileHelper::updateFile($attributes->get('favicon'), $general_setting->favicon['path'] ?? null);

                $general_setting->favicon = [
                    'image_name' => $favicon['file_name'],
                    'image_ext' => $favicon['file_ext'],
                    'size' => $favicon['size'],
                    'path' => $favicon['path'],
                    'width' => $favicon['width'],
                    'height' => $favicon['height'],
                    'mime_type' => $favicon['mime_type'],
                ];
            }

            $general_setting->site_name = $attributes->get('site_name');
            $general_setting->url = $attributes->get('url');
            $general_setting->is_active = $attributes->get('is_active');

            $general_setting->save();

            Cache::forget('general_setting');
            return ResponseHelper::success('İşleminiz başarılı bir şekilde gerçekleştirildi');
        } catch (\Exception $exception) {
            return ResponseHelper::error('Bir hata oluştu.', [$exception->getMessage()]);
        }
    }
}
