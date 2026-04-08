<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KhuvucController;
use App\Http\Controllers\BatdongsanController;
use App\Http\Controllers\GiohangController;
use App\Http\Controllers\DatlichhenController;
use App\Http\Controllers\DoanhThuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBatdongsanController;
use App\Http\Controllers\UserDatlichhenController;
use App\Http\Controllers\CheckoutController;


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

// admin
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
    Route::get('/admin/tu-choi-bai/{id}', [AdminUserController::class, 'tuChoiBai'])->name('tu.choi.bai'); 
    Route::get('datlichhen', [DatlichhenController::class, 'index'])->name('datlichhen.index');
    Route::delete('datlichhen/{id}', [DatlichhenController::class, 'destroy'])->name('datlichhen.destroy');
    Route::resource('khuvuc', KhuvucController::class);
    Route::resource('doanhthu', DoanhthuController::class);
});

// ================= USER =================
Route::prefix('users')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/timkiem', [HomeController::class,'search'])
        ->name('batdongsan.search');

    Route::get('/batdongsan/{id}', [HomeController::class, 'show'])
        ->name('batdongsan.show');
});


// ================= AUTH =================
Route::prefix('/')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


// ================= USER (LOGIN REQUIRED) =================
Route::middleware('auth')->group(function () {

    // ===== PROFILE =====
    Route::prefix('profile')->name('profile.')->group(function () {

        Route::get('/', [ProfileController::class,'index'])->name('index');
        Route::post('/update', [ProfileController::class,'update'])->name('update');

    });


    // ===== ĐĂNG TIN BĐS =====
    Route::prefix('batdongsan')->name('batdongsan.')->group(function () {

        Route::get('/create', [UserBatdongsanController::class, 'create'])->name('create');
        Route::post('/store', [UserBatdongsanController::class, 'store'])->name('store');

        Route::get('/{id}/edit', [UserBatdongsanController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserBatdongsanController::class, 'update'])->name('update');

        Route::delete('/{id}', [UserBatdongsanController::class, 'destroy'])->name('destroy');

    });


    // ===== GIỎ HÀNG =====
    Route::prefix('giohang')->name('giohang.')->group(function () {

        Route::get('/', [GiohangController::class, 'index'])->name('index');
        Route::post('/add/{id}', [GiohangController::class, 'add'])->name('add');
        Route::delete('/remove/{id}', [GiohangController::class, 'remove'])->name('remove');
        Route::delete('/clear', [GiohangController::class, 'clear'])->name('clear');

    });


    // ===== ĐẶT LỊCH =====
    Route::prefix('datlichhen')->name('datlichhen.')->group(function () {

        Route::get('/', [UserDatlichhenController::class, 'index'])->name('index');
        Route::put('/update/{id}', [UserDatlichhenController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [UserDatlichhenController::class, 'destroy'])->name('destroy');
    });

    // ===== CHECKOUT / THANH TOÁN CỌC =====
    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('index');
        Route::post('/pay', [CheckoutController::class, 'pay'])->name('pay'); 

    });

});