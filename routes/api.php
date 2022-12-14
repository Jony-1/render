<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\imagescontroller;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\Usercontroller;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Url;

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
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout'])->name('logout');

//*reset password
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('password-reset', [NewPasswordController::class, 'reset']);

Route::middleware(['auth:sanctum'])->group(function () {

    //*EMAIL VERIFICATION
    Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware('signed');
    Route::get('email/resend', [EmailVerificationController::class, 'resendEmail'])->name('verification.resend');
    // Route::get('/email/verify', fn () => view('auth.verify-email')->name('verification.notice')); <-- Vista

    //*LOGOUT
    Route::get('logout', [AuthController::class, 'logout']);
});


Route::middleware(['auth:sanctum'])->group(
    function () {

        Route::get('/user', [AuthController::class, 'user']);
    }
);
Route::resource('articles', ArticlesController::class);
Route::post('articles/update/{article}', [ArticlesController::class], 'update');
Route::resource('categories', categoriesController::class);
Route::resource('/users', Usercontroller::class);
Route::resource('sales', SalesController::class);
Route::resource('config', ConfigController::class);
Route::get('articles_images', [imagescontroller::class, 'show_image']);
// Route::get(pu)->name('get_image');
