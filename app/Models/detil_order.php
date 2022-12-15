<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detil_order extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_order",
        "id_stocksize",
        "transaction_time",
        "price_bought",
        "total_items",
        "total_price"
    ];
}
