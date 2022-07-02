<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class DisplayName
{

    function Name($string)
    {
        if ($string) {
            return $string;
        }
    }
}
