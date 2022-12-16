<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "order_date",
        "ship_date",
        "city",
        "postal_code",
        "shipment_address",
        "contact",
        "proof_of_payment",
        "notes",
        "status"
    ];
}
