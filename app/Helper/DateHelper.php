<?php

namespace App\Helper;

use Carbon\Carbon;
use DateTimeInterface;
use InvalidArgumentException;

class DateHelper
{
    // Format aliasları
    private const FORMAT_ALIASES = [
        'short'      => 'd M Y',      // 11 May 2025
        'long'       => 'd F Y',      // 11 Mayıs 2025
        'with_day'   => 'd F Y l',    // 11 Mayıs 2025 Pazartesi
        'full'       => 'd F Y H:i',  // 11 Mayıs 2025 14:30
        'time'       => 'H:i',        // 14:30
        'month_year' => 'F Y',        // Mayıs 2025
        'database'   => 'Y-m-d H:i:s' // 2025-05-11 14:30:00
    ];

    // Uzun ay isimleri (F formatı için)
    private const LONG_MONTHS = [
        'January'   => 'Ocak',
        'February'  => 'Şubat',
        'March'     => 'Mart',
        'April'     => 'Nisan',
        'May'       => 'Mayıs',
        'June'      => 'Haziran',
        'July'      => 'Temmuz',
        'August'    => 'Ağustos',
        'September' => 'Eylül',
        'October'   => 'Ekim',
        'November'  => 'Kasım',
        'December'  => 'Aralık'
    ];

    // Kısa ay isimleri (M formatı için)
    private const SHORT_MONTHS = [
        'Jan' => 'Oca',
        'Feb' => 'Şub',
        'Mar' => 'Mar',
        'Apr' => 'Nis',
        'May' => 'May',
        'Jun' => 'Haz',
        'Jul' => 'Tem',
        'Aug' => 'Ağu',
        'Sep' => 'Eyl',
        'Oct' => 'Eki',
        'Nov' => 'Kas',
        'Dec' => 'Ara'
    ];

    // Gün isimleri (l formatı için)
    private const DAY_NAMES = [
        'Monday'    => 'Pazartesi',
        'Tuesday'   => 'Salı',
        'Wednesday' => 'Çarşamba',
        'Thursday'  => 'Perşembe',
        'Friday'    => 'Cuma',
        'Saturday'  => 'Cumartesi',
        'Sunday'    => 'Pazar'
    ];

    /**
     * Magic method for static calls like DateHelper::short($date)
     */
    public static function __callStatic($name, $arguments)
    {
        if (array_key_exists($name, self::FORMAT_ALIASES)) {
            return self::format($arguments[0] ?? now(), $name);
        }

        throw new \BadMethodCallException("Method {$name} not found");
    }

    /**
     * Tarihi belirtilen formatta gösterir
     */
    public static function format($date, string $format = 'short'): string
    {
        $carbon = self::parseDate($date);
        $formatPattern = self::FORMAT_ALIASES[$format] ?? $format;
        $formatted = $carbon->format($formatPattern);

        // Önce uzun ayları çevir
        $formatted = strtr($formatted, self::LONG_MONTHS);
        // Sonra kısa ayları çevir
        $formatted = strtr($formatted, self::SHORT_MONTHS);
        // En son gün isimlerini çevir
        $formatted = strtr($formatted, self::DAY_NAMES);

        return $formatted;
    }


    /**
     * Girdiyi Carbon nesnesine çevirir
     */
    private static function parseDate($date): Carbon
    {
        if ($date instanceof Carbon) {
            return $date;
        }

        if ($date instanceof DateTimeInterface) {
            return Carbon::instance($date);
        }

        if (is_string($date)) {
            try {
                return Carbon::parse($date);
            } catch (\Exception $e) {
                throw new InvalidArgumentException("Geçersiz tarih formatı: {$date}");
            }
        }

        throw new InvalidArgumentException('Geçersiz tarih tipi');
    }

    /**
     * Kullanılabilir format listesi
     */
    public static function getAvailableFormats(): array
    {
        return array_keys(self::FORMAT_ALIASES);
    }
}
