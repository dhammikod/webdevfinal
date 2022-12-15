<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_request extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "request_picture",
        "description",
        "status",
        "title",
    ];
}
