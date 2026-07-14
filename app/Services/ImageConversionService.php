<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageConversionService
{
    /**
     * Upload gambar dan konversi ke WebP jika bukan WebP.
     *
     * @param  UploadedFile  $file  File gambar yang diupload
     * @param  string  $directory  Direktori tujuan penyimpanan
     * @param  string  $disk  Disk storage yang digunakan (default: sftp)
     * @param  int  $quality  Kualitas WebP 0-100 (default: 85)
     * @return string Path file yang disimpan
     */
    public function uploadAndConvertToWebp(
        UploadedFile $file,
        string $directory,
        string $disk = 'sftp',
        int $quality = 85
    ): string {
        $extension = strtolower($file->getClientOriginalExtension());

        if ($extension === 'webp') {
            return $file->store($directory, $disk);
        }

        $imageContent = file_get_contents($file->getRealPath());
        $image = imagecreatefromstring($imageContent);

        if ($image === false) {
            return $file->store($directory, $disk);
        }

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.webp';
        $path = $directory.'/'.$filename;

        ob_start();
        imagewebp($image, null, $quality);
        $webpData = ob_get_clean();

        imagedestroy($image);

        Storage::disk($disk)->put($path, $webpData);

        return $path;
    }

    /**
     * Hapus file dari storage.
     */
    public function deleteFile(?string $path, string $disk = 'sftp'): bool
    {
        if (! $path) {
            return false;
        }

        return (bool) Storage::disk($disk)->delete($path);
    }
}
