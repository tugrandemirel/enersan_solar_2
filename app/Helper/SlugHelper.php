<?php

namespace App\Helper;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class SlugHelper
{
    /**
     * Türkçe karakterler için özel dönüşüm tablosu
     */
    private static array $turkishReplacements = [
        'ş' => 's', 'Ş' => 's',
        'ı' => 'i', 'İ' => 'i',
        'ğ' => 'g', 'Ğ' => 'g',
        'ü' => 'u', 'Ü' => 'u',
        'ö' => 'o', 'Ö' => 'o',
        'ç' => 'c', 'Ç' => 'c',
    ];

    /**
     * Verilen string'i Türkçe karakter desteği ile slug formatına çevirir
     */
    public static function generateSlug(string $string, string $separator = '-'): string
    {
        // Türkçe karakterleri değiştir
        $string = str_replace(
            array_keys(self::$turkishReplacements),
            array_values(self::$turkishReplacements),
            $string
        );

        // Özel karakterleri temizle (harf, rakam ve boşluk dışındakiler)
        $string = preg_replace('/[^a-zA-Z0-9\s]/', '', $string);

        // Str::slug fonksiyonunu kullan
        return Str::slug($string, $separator);
    }

    /**
     * Unique slug oluşturur (Türkçe karakter desteği ile)
     */
    public static function generateUniqueSlug(
        string $string,
        string $model,
        string $column = 'slug',
        ?int $ignoreId = null,
        string $separator = '-'
    ): string {
        $slug = self::generateSlug($string, $separator);
        $originalSlug = $slug;
        $counter = 1;

        // Model kontrolü
        if (!class_exists($model) || !is_subclass_of($model, Model::class)) {
            throw new \InvalidArgumentException("$model geçerli bir Eloquent model değil");
        }

        // Slug kontrolü
        while (self::slugExists($model, $column, $slug, $ignoreId)) {
            $slug = $originalSlug . $separator . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Veritabanında slug'ın varlığını kontrol eder
     */
    private static function slugExists(
        string $model,
        string $column,
        string $slug,
        ?int $ignoreId = null
    ): bool {
        $query = $model::query()->where($column, $slug)->withTrashed();

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        return $query->exists();
    }
}
