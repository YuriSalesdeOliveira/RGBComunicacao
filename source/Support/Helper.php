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
}