<?php

namespace App\Enum\Service;

enum ServiceDocumentTypeEnum: string
{
    case IMAGE = 'image';
    case DOCUMENT = 'document';


    public static function values(): array
    {
        return array_map(fn($item) => $item->value, self::cases());
    }
    public function getType(): string
    {
        return $this->value;
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::IMAGE => 'Resim',
            self::DOCUMENT => 'Belge',
        };
    }
}
