<?php

namespace Source\Domain\Classes;

use Exception;

class Description
{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function parse(string $value): static
    {
        if (empty($value)) { throw new Exception('O valor de description não pode ser vazio.'); }

        $description = new static($value);

        return $description;
    }

    public static function tryParse(string $value) {}

    public function __toString()
    {
        return $this->value;
    }
}