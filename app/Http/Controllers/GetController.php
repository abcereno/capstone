<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetController extends Controller
{
    //
    public function GetServiceName()
    {
        $services = DB::table("services")
            ->select("service_name")
            ->get();
        return response()->json($services);
    }
    public function GetReviews()
    {
        $services = DB::table("reviews")
            ->select("rating", "email", "service_name")
            ->get();
        return response()->json($services);
    }
    public function GetPayment()
    {
        $services = DB::table("payments")
            ->select("customer_payment_number", "date", "total_amount", "service_name")
            ->get();
        return response()->json($services);
    }
    public function GetOrders()
    {
        $services = DB::table("orders")
            ->select("user_id", "service_name", "email", "order_date")
            ->where("order_status", "pending")
            ->get();
        return response()->json($services);
    }
}
