<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Layout/Login');
});

//userLogin
route::post('/CheckLogin', [UserController::class, 'Login']);
route::post('/LogOut', [UserController::class, 'Logout']);
Route::get('/Register', function () {
    return view('Layout/Register');
});
route::post('/RegisterData', [UserController::class, 'Register']);
// Dashboard
route::get('/Dashboard', [DashboardController::class, 'index']);
Route::get('/Dashboard/{kategori}', [DashboardController::class, 'DashboardByKategori']);
Route::post('/ClaimVoucherUpdate', [DashboardController::class, 'UpdateVoucher']);

// History
route::get('/History', [HistoryController::class, 'index']);
route::post('/HistoryRemove', [HistoryController::class, 'delete']);
