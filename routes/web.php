<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });
#Auth User
Route::get('/',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'sign_in'])->name('sign_in');
Route::post('register',[UserController::class,'register'])->name('register');



#Auth Middleware Users
Route::group(['middleware' => 'authuser'], function () {
#Auth Logout
Route::get('/users/auth/logout', [UserController::class, 'logout'])->name('logout');
#Users List
Route::get('/user/list',[UserController::class,'show'])->name('users.show');


});
