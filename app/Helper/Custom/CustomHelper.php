<?php

namespace App\Helpers\Custom;

class CustomHelper
{
    /**
     * @param $url
     * @return array|string|string[]|null
     */
    public static function formatUrl($url): array|string|null
    {
        // URL'yi küçük harflere dönüştür
        $url = strtolower(trim($url));

        // Eğer URL 'http' veya 'https' ile başlamıyorsa, 'https' ekle
        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = 'https://' . $url;
        }

        // www'yı kaldır
        $url = preg_replace('/^https?:\/\/(www\.)/', 'https://', $url);

        // URL'yi düzgün formatta döndür
        return $url;
    }
}
