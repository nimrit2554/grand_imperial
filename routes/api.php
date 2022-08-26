<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Public routes
Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/resend-otp', [AuthController::class, 'resendOTP']);
    
    Route::post('/verify-otp', [AuthController::class, 'verifyOTP']);
    
    Route::get('/get-profile', [AuthController::class, 'getProfile']);
    
    Route::post('/update-user', [AuthController::class, 'updateUser']);
    
    Route::post('/generate-pin', [AuthController::class, 'generatePIN']);
    
    Route::post('/forgot-pin', [AuthController::class, 'forgotPIN']);
    
    Route::post('/reset-pin', [AuthController::class, 'resetPIN']);
    
    Route::post('/change-pin', [AuthController::class, 'changePIN']);

    Route::post('/profilepic-upload', [AuthController::class, 'profilepicUpload']);

    Route::post('/logout', [AuthController::class, 'logout']);
});