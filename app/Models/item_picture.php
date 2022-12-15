<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_picture extends Model
{
    use HasFactory;


    protected $fillable = [
        "picture",
        "id_item",
    ];
}
