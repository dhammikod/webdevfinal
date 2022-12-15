<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_size_stock extends Model
{
    use HasFactory;

    protected $fillable = [
        "size",
        "stock",
        "id_item",
    ];
}
