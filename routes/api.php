<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });
*/
// login route
Route::post("/login", [AuthController::class, "Login" ]);
// register route
Route::post("/register", [AuthController::class, "Register" ]);
// register as service provider
Route::post("/registerserviceprovider", [AuthController::class, "RegisterServiceProvider" ]);
Route::post("/service", [PostingController::class, "PostService" ]);
Route::post("/review", [PostingController::class, "PostReview" ]);
Route::post("/payment", [PostingController::class, "PostPayment" ]);
Route::post("/order", [PostingController::class, "PostOrder" ]);








// forgot password route
Route::post("/forgotpassword", [ForgotController::class, "ForgotPassword" ]);
// reset password route
Route::post("/resetpassword", [ResetController::class, "ResetPassword" ]);
// get user route
// user middleware to check if the user is logged in
Route::get("/user", [UserController::class, "User" ])->middleware("auth:api");
Route::get("/getregistereduser", [GetController::class, "GetUsers" ]);
