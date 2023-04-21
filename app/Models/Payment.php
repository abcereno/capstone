<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        "customer_payment_number",
        "date",
        "payment_type",
        "total_amount",
        "service_name",
        ];
}
