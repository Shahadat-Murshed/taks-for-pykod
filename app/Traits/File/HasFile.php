<?php

namespace App\Traits\File;

trait HasFile
{
    private function saveFile(
        ?string $prefix,
        string $name,
        \Illuminate\Http\UploadedFile $file,
        ?string $custom,
        ?int $other,
        string $directory,
    ): string {
        $name = str_replace(
            [' ', '%', ':'],
            '',
            $prefix . '-' . $name . ($custom ? "-{$custom}" : '') . ($other ? "-{$other}" : '')
        ) . '.' . $file->extension();

        $storageLocation = "public/{$directory}";
        $publicLocation =  "storage/{$directory}";

        $file->storeAs($storageLocation, $name);

        return "{$publicLocation}/{$name}";
    }

    private function removefile($file): bool
    {
        if ($file) {
            return !file_exists($file) ?: unlink(public_path($file));
        } else {
            return 0;
        }
    }
}
