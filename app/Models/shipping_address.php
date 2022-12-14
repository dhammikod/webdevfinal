<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping_address extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "postal_code",
        "shipment_address",
        "contact",
        "city",
        "notes"
    ];
}
