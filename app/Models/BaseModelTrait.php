<?php

namespace App\Models;

use App\Helpers\Main;


trait BaseModelTrait
{
    public function getGenderNameAttribute()
    {
        return Main::getGender($this->gender);
    }
}
