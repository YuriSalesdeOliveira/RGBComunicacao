<?php

use Laminas\Diactoros\UploadedFile;
use YuriOliveira\Validation\Validate;
use YuriOliveira\Validation\Message\Message;

// Custom validations

Validate::extend('requiredUploadedFile', function(string $key, UploadedFile $uploadedFile){

    if ($uploadedFile->getSize() === 0)
    {
        return Message::get('required', $key);
    }
    
    return true;
});