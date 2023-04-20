<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\ServiceProvider;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Summary of AuthController
 */
class AuthController extends Controller
{
    // login
    public function Login(Request $request)
    {
        try {
            if (Auth::attempt($request->only("email", "password"))) {
                $user = Auth::user();
                $token = $user->createToken("app")->accessToken;
                return response([
                    "message" => "Successfully Login",
                    "token" => $token,
                    "user" => $user
                ], 200);
            }
        } catch (Exception $exception) {
            return response([
                "message" => $exception->getMessage()
            ], 400);
        }
        // expected errors
        return response([
            "message" => "Invalid Email or Password"
        ], 401);
    }
    // Register
    public function Register(RegisterRequest $request)
    {
        try {
            // eloquent
            $user = User::create([
                "name" => $request->name,
                "address" => $request->address,
                "contact" => $request->contact,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);
            $token = $user->createToken("app")->accessToken;
            return response([
                "message" => "Registration Successful",
                "token" => $token,
                "user" => $user
            ], 200);
        } catch (Exception $exception) {
            return response([
                "message" => $exception->getMessage()
            ], 400);
        }
    }

    public function RegisterServiceProvider(ProviderRequest $request)
    {
        try{
            // eloquent
            $serviceName = DB::table("services")->insert([
                    "service_name" => $request->service_name
                ]);
            $user = ServiceProvider::create([
                "service_provider_name" => $request->name,
                "address" => $request->address,
                "contact" => $request->contact,
                "service_name" => $request->service_name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);
            $token = $user->createToken("app")->accessToken;
            return response([
                "message" => "Registration Successful",
                "token" => $token,
                "user" => $user
            ], 200);
        } catch (Exception $exception) {
            return response([
                "message" => $exception->getMessage()
            ], 400);
        }
    }
}
