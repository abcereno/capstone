<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
            "user_id" => "required",
            "service_name" => "required",
            "email" => "required",
            "order_date" => "required",
            "order_status",
            "total_amount",
        ];
}
