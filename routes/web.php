<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhuvucController;
use App\Http\Controllers\BatdongsanController;
use App\Http\Controllers\GiohangController;
use App\Http\Controllers\DatlichhenController;

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
    return redirect()->route('home');
});


// User
Route::get('/home', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\AuthController;


Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUserController;

Route::prefix('admin')->name('admin.')->group(function(){

    // login admin
    Route::get('/login',[AdminAuthController::class,'showLogin'])->name('login');
    Route::post('/login',[AdminAuthController::class,'login'])->name('login.post');

    // dashboard
    Route::get('/dashboard',[AdminAuthController::class,'dashboard'])
        ->name('dashboard');

    // logout
    Route::post('/logout',[AdminAuthController::class,'logout'])->name('logout');

    // CRUD admin
    Route::resource('batdongsan', BatdongsanController::class);
    Route::resource('user', AdminUserController::class);
    Route::get('/admin/duyet-bai/{id}', [AdminUserController::class, 'duyetBai'])->name('duyet.bai');    
    Route::resource('datlichhen', DatlichhenController::class);
    Route::resource('khuvuc', KhuvucController::class);
});



//  Giỏ hàng
Route::get('/giohang', [GiohangController::class, 'index'])
    ->middleware('auth')
    ->name('giohang.index');
Route::post('/giohang/add/{id}', [GiohangController::class, 'add'])->name('giohang.add');
Route::delete('/giohang/remove/{id}', [GiohangController::class, 'remove'])->name('giohang.remove');

//  Đặt lịch hẹn
Route::get('/datlichhen', [DatlichhenController::class, 'index'])->name('datlichhen.index');
Route::get('/datlichhen/create/{idbds}', [DatlichhenController::class, 'create'])->name('datlichhen.create');
Route::post('/datlichhen/store/{idbds}', [DatlichhenController::class, 'store'])->name('datlichhen.store'); // hoặc bỏ {idbds} nếu lấy từ form
Route::put('/datlichhen/update/{id}', [DatlichhenController::class, 'update'])->name('datlichhen.update');
Route::delete('/datlichhen/destroy/{id}', [DatlichhenController::class, 'destroy'])->name('datlichhen.destroy');

use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class,'index'])
    ->middleware('auth')
    ->name('profile.index');

Route::post('/profile/update', [ProfileController::class,'update'])
    ->middleware('auth')
    ->name('profile.update');

    


