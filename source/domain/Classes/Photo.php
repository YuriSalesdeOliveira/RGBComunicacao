<?php

namespace Source\Domain\Classes;

class Photo
{
    protected string $value;

    public function __construct(array $value)
    {
        $this->value = $this->upload();
    }

    protected function upload(): string
    {
        // faz upload da imagem para devolver o caminho para onde
        // ela foi colocada no upload

        $path = 'path';

        return $path;
    }

    public static function parse(array $value)
    {
        // faz a validação dos dados da imagem

        $photo = new static($value);

        return $photo;
    }

    public static function tryParse(array $value) {}

    public function __toString(): string
    {
        return $this->value;
    }
}