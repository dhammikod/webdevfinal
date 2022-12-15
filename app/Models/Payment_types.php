<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_types extends Model
{
    use HasFactory;
    protected $fillable = [
        "payment_type",
        "store_acc_number",
        "acc_name"
    ];
}
