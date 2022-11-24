<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewProduct extends Model
{
    use HasFactory;

    private static $new_products = [
        [
            'id' => 0,
            'name' => "Birthyearbike (panshovel)",
            'desc' => "'The greatest glory in living lies not in never failing, but in rising every time we fell'",
            'img1' => "idk1.jpg",
            'img2' => "idk2.jpg"
        ]
    ];

    public static function index() {
        return self::$new_products;
    }
}
