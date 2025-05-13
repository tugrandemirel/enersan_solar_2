<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FileHelper
{
    // Dosya Yükleme
    public static function uploadFile($file): array
    {
        $folderPath = self::generateFilePath();

        $fileName = self::generateFileName($file);

        $path = $file->storeAs($folderPath, $fileName, 'public');

        return self::getFileData($file, $path);
    }

    // Dosya Güncelleme
    public static function updateFile($file, ?string $oldFilePath)
    {
        if ($oldFilePath && Storage::disk('public')->exists($oldFilePath)) {
            Storage::disk('public')->delete($oldFilePath);
        }

        return self::uploadFile($file);
    }

    // Dosya Silme
    public static function deleteFile($filePath)
    {
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
            return true;
        }

        $newFilePath = str_replace("uploads/", "", $filePath);
        if (Storage::disk('public')->exists($newFilePath)) {
            Storage::disk('public')->delete($newFilePath);
            return true;
        }

        return false;
    }

    // Dosya bilgilerini döndüren method
    private static function getFileData($file, $path)
    {
        $size = $file->getSize(); // Dosya boyutu
        $mimeType = $file->getMimeType(); // MIME türü
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME); // Dosya adı
        $fileExt = $file->getClientOriginalExtension(); // Dosya uzantısı

        $data = [
            'file_name' => $fileName,
            'file_ext' => $fileExt,
            'size' => $size,
            'path' => "uploads/" . $path,
            'mime_type' => $mimeType,
        ];

        // Eğer dosya bir resim ise, boyut bilgilerini ekle
        if (Str::startsWith($mimeType, 'image/')) {
            $absolutePath = Storage::disk('public')->path($path);

            if (file_exists($absolutePath)) {
                $imageSize = @getimagesize($absolutePath);

                if ($imageSize !== false) {
                    $data['width'] = $imageSize[0] ?? null;
                    $data['height'] = $imageSize[1] ?? null;
                } else {
                    $data['width'] = null;
                    $data['height'] = null;
                }
            } else {
                $data['width'] = null;
                $data['height'] = null;
            }
        }

        return $data;
    }

    // Klasör yapısını oluşturma (Yıl/Ay/Gün/Saat)
    private static function generateFilePath(): string
    {
        $now = Carbon::now();
        return $now->year . '/' . $now->month . '/' . $now->day . '/' . $now->hour;
    }

    // Benzersiz dosya ismi oluşturma
    private static function generateFileName($file): string
    {
        $fileExtension = $file->getClientOriginalExtension();
        $hashedName = str_replace(['/', '.'], '-', hash('sha256', Str::uuid()->toString()));
        return $hashedName . '.' . $fileExtension;
    }
}
