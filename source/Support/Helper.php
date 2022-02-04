<?php

namespace Source\Support;

class Helper
{
    public function assets(string $asset): string
    {
        return SITE['root'] . "/assets/{$asset}";
    }

    public function storage(string $storage)
    {
        return SITE['root'] . "/storage/{$storage}";
    }

    public function listFiles(string $directory): array|bool
    {
        if (is_dir($directory))
        {
            $directory = dir($directory);
            $files = [];

            while($file = $directory->read())
            {
                array_push($files, $file);
            }

            $directory->close();

            return $files;
        }

        return false;
    }

    public function isImage(string $directory, string $image): bool
    {
        if (!$this->allowedImageTypes($image)) { return false; }

        $image = $directory . "/{$image}";

        $allowed_types = [
            IMAGETYPE_JPEG,
            IMAGETYPE_PNG,
            IMAGETYPE_GIF
        ];

        $details = getimagesize($image);
        $image_type = $details[2];

        if (in_array($image_type, $allowed_types)) { return true; }

        return false;
    }

    public function allowedImageTypes(string $image): bool
    {
        $allowed_types = [
            'jpeg',
            'jpg',
            'png',
            'gif'
        ];

        $image = explode('.', $image);

        if (in_array($image[1], $allowed_types)) { return true; }

        return false;
    }
}