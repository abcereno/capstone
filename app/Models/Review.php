<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        "rating",
        "order_id",
        "user_id",
        "email",
        "service_name",
        "review_description",
        ];
}
