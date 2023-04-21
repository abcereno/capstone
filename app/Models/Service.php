<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
            "service_name",
            "user_id",
            "service_description",
            "price",
            "availability_calendar",
        ];
}
