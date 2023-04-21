<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotRequest;
use App\Mail\ForgetMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotController extends Controller
{
    // forgot password
    public function ForgotPassword(ForgotRequest $request)
{
    // get the email address
    $email = $request->email;

    // check if email address does not exist
    if (DB::table("users")->where("email", $email)->doesntExist()) {
        return response([
            "message" => "Invalid Email"
        ], 401);
    }

    try {
        // check if a token already exists
        $existingToken = DB::table('password_resets')->where('email', $email)->first();
        if ($existingToken) {
            // if a token already exists, use the existing token
            $token = $existingToken->token;
        } else {
            // if no token exists, generate a new one
            $token = rand(10, 100000);
            // insert the new token into the password_resets table
            DB::table("password_resets")->insert([
                "email" => $email,
                "token" => $token
            ]);
        }

        // send mail using forgotMail
        Mail::to($email)->send(new ForgetMail($token));

        return response([
            "message" => "Reset Password Mail Sent to Email"
        ], 200);
    } catch (Exception $exception) {
        return response([
            "message" => $exception->getMessage()
        ], 400);
    }
}

}
