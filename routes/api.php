<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\AttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

//route middlwere sanctum grup
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/company', [CompanyController::class, 'show']);
    Route::post('checkin', [AttendanceController::class, 'checkin']);
    Route::post('/checkout', [AttendanceController::class, 'checkout']);
    Route::get('/is-checkin', [AttendanceController::class, 'isCheckedin']);
    // //update profile
    Route::post('update-profile', [App\Http\Controllers\Api\AuthController::class, 'updateProfile']);
    // //create permission
    Route::apiResource('/api-permissions', App\Http\Controllers\Api\PermissionController::class);
    //notes
    Route::apiResource('/api-notes', App\Http\Controllers\Api\NoteController::class);
    //update fcm token
    Route::post('/update-fcm-token', [App\Http\Controllers\Api\AuthController::class, 'updateFcmToken']);
    //get attendance
    Route::get('/api-attendances', [AttendanceController::class, 'index']);
});
