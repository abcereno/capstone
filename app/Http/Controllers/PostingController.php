<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostingController extends Controller
{
    //
    public function PostService(Request $request)
    {
        DB::table("services")->insert([
            "service_name" => $request->input("service_name"),
            "user_id" => $request->input("user_id"),
            "service_description" => $request->input("service_description"),
            "price" => $request->input("price"),
            "availability_calendar" => $request->input("availability_calendar"),
        ]);
        return response([
            "message" => "Service Added Successful",
        ], 200);
    }
    public function PostReview(Request $request)
    {
        DB::table("reviews")->insert([
            "rating" => $request->input("rating"),
            "order_id" => $request->input("order_id"),
            "user_id" => $request->input("user_id"),
            "email" => $request->input("email"),
            "service_name" => $request->input("service_name"),
            "review_description" => $request->input("review_description"),
        ]);
        return response([
            "message" => "Review Posted Successfully",
        ], 200);
    }
    public function PostOrder(Request $request)
    {
        DB::table("orders")->insert([
            "user_id" => $request->input("user_id"),
            "service_name" => $request->input("service_name"),
            "email" => $request->input("email"),
            "order_date" => $request->input("order_date"),
            "total_amount" => $request->input("total_amount"),
        ]);
        return response([
            "message" => "Order Added Successfully",
        ], 200);
    }
    public function PostPayment(Request $request)
    {
        //customer payment number, date, type of payment if check or cash, total, payment descrip
        $payment = Payment::create([
            "customer_payment_number" => $request->input("customer_payment_number"),
            "date" => $request->input("date"),
            "payment_type" => $request->input("payment_type"),
            "total_amount" => $request->input("total_amount"),
            "service_name" => $request->input("service_name"),
        ]);
        return response([
            "message" => "Payment Posted Successfully",
            "details" => $payment
        ], 200);
    }
}
