<?php

namespace App\Helpers;

class FileName 
{
    public static function avatars()
    {
        $name = str_random(50);
        $extension = '.jpg';

        return $name.$extension;
    }
}