<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// ホーム画面（一般ユーザー向け）
Route::get('/', [ProductController::class, 'index'])->name('home');

// ユーザー登録画面
Route::get('/registration', function () {
    return view('registration');
})->name('registration');

// ユーザー登録画面
Route::get('/registrationconfirm', function () {
    return view('registrationconfirm');
})->name('registration.confirm');

// ユーザーバリデーション
Route::post('/registrationconfirm', [RegisteredUserController::class, 'attention']
)->name('attention');

// ユーザー登録処理
Route::post('/registrationstore', [RegisteredUserController::class, 'store']
)->name('register.store');

// ユーザー登録完了画面
Route::get('/registrationcomplete', function () {
    return view('registrationcomplete');
})->name('register.complete');

// 商品一覧画面
Route::get('/index', [ProductController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function () {
    //アイテム画面
    Route::get('/itemlist', function(){
        return view('itemlist');
    })->name('itemlist');
    // 商品詳細画面
    Route::get('/item/{id}', [ProductController::class, 'show'])->name('item');
    // カート追加
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    // カート画面
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    // カートから削除
    Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    // 決済画面
    Route::post('/payment', [PaymentController::class, 'charge'])->name('payment');
    // 購入完了画面
    Route::get('/payment.complete', function () {
        return view('paymentcomplete');
    })->name('payment.complete');
});


// 管理者ログイン画面
Route::get('/adminlogin', function () {
    return view('adminlogin');
})->name('admin.login');

// 管理者商品一覧画面
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');

// 管理者ログアウト処理
Route::post('/adminlogout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// 商品管理画面（新規追加）のルート
Route::get('/adminitemedit', function () {
    return view('adminitemedit');
})->name('admin.item.edit');

Route::post('/adminitemedit', [ProductController::class, 'store'])->name('admin.products.store');

// ユーザー追加画面
Route::get('/admin/users/create', function () {
    return view('admin.users.create');
})->name('admin.users.create');

// ユーザー追加処理
Route::post('/admin/users', [UserController::class, 'adminStore'])->name('admin.users.store');

// プロフィール関連のルート
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';


