<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopping_cart extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "item_id",
        "item_size_stock_id",
        "jumlah"
    ];
}
