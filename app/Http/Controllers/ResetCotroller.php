<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ResetController extends Controller
{
    // reset route
    public function ResetPassword(ResetRequest $request)
    {
        // initialize email, token, password
        $email = $request->email;
        $token = $request->token;
        $password = Hash::make($request->password);
        // create query variables
        $emailcheck = DB::table("password_resets")->where("email", $email)->first();
        $pincheck = DB::table("password_resets")->where("token", $token)->first();
        // check if the email and pin exist
        if (!$emailcheck) {
            return response([
                "email" => "Email Not Found!"
            ], 401);
        }
        if (!$pincheck) {
            return response([
                "email" => "Email Not Found!"
            ], 401);
        }
        // update password in users table
        DB::table("users")->where("email", $email)->update(["password" => $password]);
        // delete the email entry in password_resets rable
        DB::table("password_resets")->where("email", $email)->delete();
        // return a message
        return response([
            "message" => "Password Changed Successfully"
        ]);
    }
}
