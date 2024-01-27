<?php

namespace App\Helpers;
use File;

class Main
{

    public static function getGender($id = null)
    {
        $data = [
            1 => 'Male',
            2 => 'Female',
        ];
        if ($id != 'all') {
            return $data[$id];
        }
        return $data;
    }

    public static function storeMedia($type, $image, $update = null)
    {
        $name = "";
        if (!empty($image)) {
            $name = strtotime("now") . '.' . $image->extension();
            $image->move(public_path('uploads/' . $type), $name);
            if (!empty($update) && $name != $update) {
                File::delete(public_path('uploads/' . $type . $update));
            }
        }
        return $name;
    }
}
