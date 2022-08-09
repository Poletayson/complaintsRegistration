<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComplaintController;

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
    return view('welcome');
});

Route::get('/complaints', function () {
    return view('complaintsList');
});

Route::get('/complaints/create', [ComplaintController::class, 'create']);
Route::post('/complaints/create', [ComplaintController::class, 'store']);

Route::get('/complaints/{complaint}', [ComplaintController::class, 'show']);

