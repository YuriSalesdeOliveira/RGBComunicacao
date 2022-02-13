<?php

namespace Source\ValueObjects;

use Exception;
use Source\Support\Helper;

class Photo
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function parse(string $value)
    {
        $image_directory = PATH['storage'] . '/images';

        if (file_exists($image_directory . "/{$value}") && Helper::isImage($image_directory, $value))
        {
            $photo = new static($value);

            return $photo;
        }

        throw new Exception('O valor de photo deve ser uma imagem válida.');
    }

    public static function tryParse(string $value) {}

    public function __toString(): string
    {
        return $this->value;
    }
}