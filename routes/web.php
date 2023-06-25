<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Order\OrderController;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('heropage');
});
Route::get('/test', function () {
    return view('employee.index');
});
Route::get('/order_page', function () {
    return view('buyer.index');
});
Route::get('/nota_page', function () {
    return view('buyer.nota');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::put('/orders/{id}/accept', [OrderController::class, 'acceptOrder'])->name('orders.accept');
Route::put('/orders/{id}/reject', [OrderController::class, 'rejectOrder'])->name('orders.reject');
Route::put('/orders/{id}/done', [OrderController::class, 'doneOrder'])->name('orders.done');
Route::get('/nota/{id}/download-pdf', [OrderController::class, 'downloadNota'])->name('nota.download');;


Route::middleware(['auth'])->group(function () {
    // Menyediakan akses hanya untuk pengguna yang sudah terotentikasi

    Route::get('/employee_home', [HomeController::class, 'employeeHome'])->name('employee.home');
    Route::get('/buyer_home', [HomeController::class, 'buyerHome'])->name('buyer.home');
    Route::get('/buyer/orders', [OrderController::class, 'showAllOrders'])->name('buyer.orders');
    Route::get('/pending-orders', [OrderController::class, 'showPendingOrdersWithUserInfo'])->name('orders.pending');
    Route::get('/accepted-orders', [OrderController::class, 'showAcceptedOrdersWithUserInfo'])->name('orders.accepted');



    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/{id}', [MenuController::class, 'show'])->name('menu.show');
        Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    });
});
