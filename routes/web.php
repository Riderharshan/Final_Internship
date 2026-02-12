<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Models\Category;
use App\Http\Controllers\ReviewController;


/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('home'))->name('home');

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/category/{id}', [ProductController::class, 'category']);

/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'view']);
Route::post('/add-to-cart-ajax/{id}', [CartController::class, 'addAjax']);
Route::post('/cart/increase', [CartController::class, 'increaseAjax']);
Route::post('/cart/decrease', [CartController::class, 'decreaseAjax']);
Route::get('/remove-from-cart/{id}', [CartController::class, 'remove']);
Route::post('/cart/clear', function () {
    session()->forget('cart');
    return redirect('/cart');
})->name('cart.clear');
Route::get('/cart-empty-view', fn () => view('partials.empty-cart'));

/*
|--------------------------------------------------------------------------
| Checkout → Payment → Order
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/checkout', [OrderController::class, 'checkout']);
    Route::post('/checkout', [OrderController::class, 'storeCheckout']);

    Route::get('/payment', [OrderController::class, 'payment']);
    Route::post('/place-order', [OrderController::class, 'placeOrder']);

    Route::get('/order-success/{id}', fn ($id) =>
        view('order-success', ['orderId' => $id])
    );

    Route::get('/my-orders', [OrderController::class, 'myOrders']);

    Route::post('/reorder/{order}', [OrderController::class, 'reorder']);
    Route::post('/rate-product', [ProductController::class, 'rate']);

    
});

/*
|--------------------------------------------------------------------------
| Invoice
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/invoice/{id}', [InvoiceController::class, 'show']);
    Route::get('/invoice/{id}/download', [InvoiceController::class, 'download']);
});

/*
|--------------------------------------------------------------------------
| Profile + Settings
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile/edit', [ProfileController::class, 'edit']);
    Route::post('/profile/update', [ProfileController::class, 'update']);

    Route::get('/profile/settings', fn () => view('profile-settings'));

    Route::get('/order-status', [OrderController::class, 'orderStatus']);
    Route::post('/order-delivered', [OrderController::class, 'markDelivered']);
});

Route::get('/profile/addresses', [ProfileController::class, 'addresses'])->middleware('auth');
Route::post('/profile/addresses', [ProfileController::class, 'storeAddress'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Admin Dashboard (SECURE)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        // Products list
        Route::get('/products', [AdminDashboardController::class, 'products'])
            ->name('admin.products');

        // Add product page
        Route::get('/products/create', function () {
            $categories = Category::orderBy('name')->get();
            return view('admin.add-product', compact('categories'));
        })->name('admin.products.create');

        // ✅ ADD PRODUCT (POST) — THIS FIXES 404
        Route::post('/products', [AdminProductController::class, 'store'])
            ->name('admin.products.store');

        // Orders
        Route::get('/orders', [AdminOrderController::class, 'index'])
            ->name('admin.orders');

        Route::post('/update-order-status', [AdminOrderController::class, 'updateStatus'])
            ->name('admin.update.order.status');

        Route::get('/orders/{order}', [AdminOrderController::class, 'show'])
            ->name('admin.orders.show');

        // Users
        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('admin.users');
        
        Route::post('/add-product', [AdminProductController::class, 'store']);
       
        Route::get('/products/delete/{id}', [AdminProductController::class, 'destroy'])
    ->name('admin.products.delete');
      
    // Edit product
Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])
    ->name('admin.products.edit');

// Update product
Route::post('/products/{id}/update', [AdminProductController::class, 'update'])
    ->name('admin.products.update');



    });

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', fn () => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile/change-password', [ProfileController::class, 'changePassword'])
    ->middleware('auth');

Route::post('/profile/change-password', [ProfileController::class, 'updatePassword'])
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| About Us
|--------------------------------------------------------------------------
*/

Route::get('/about-us', fn () => view('about-us'));



/*
|----------------------------------------------------------------------------
|Review
|-----------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::post('/reviews', [ReviewController::class, 'store'])
        ->name('review.store');

    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])
        ->name('review.edit');

    Route::put('/reviews/{review}', [ReviewController::class, 'update'])
        ->name('review.update');

    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])
        ->name('review.delete');
});



