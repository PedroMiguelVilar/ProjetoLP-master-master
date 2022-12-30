<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PurchasedItemsController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\SoldItemsController;
use App\Http\Controllers\Search;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\WishlistController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify' => true]);

Route::get('/',[HomeController::class, 'index'])->name('welcome');
Route::get('/search',[Search::class, 'search']);
Route::get('/searchproducts',[Search::class, 'searchpage'])->name('searchproducts');
Route::get('/showproducts/{product}', [ProductController::class,'show'])->name('products.show');

Route::middleware(['auth'])->group(function() {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.showproducts')->middleware('Role_Admin');
    Route::get('/users', [HomeController::class, 'showusers'])->name('admin.showusers')->middleware('Role_Admin');
    Route::put('/users/{user}', [HomeController::class, 'update'])->name('users.update')->middleware('Role_Admin');
    Route::delete('/users/{user}', [HomeController::class, 'destroy'])->name('users.destroy')->middleware('Role_Admin');

    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/product-images/{id}',[ProductController::class,'images'])->name('product.images');
    
    Route::get('/products/{product}/edit', [ProductController::class,'edit'])->name('products.edit')->middleware('Role_Admin');
    Route::put('/products/{product}', [ProductController::class,'update'])->name('products.update')->middleware('Role_Admin');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware('Role_Admin');

    Route::get('/myproducts', [ProductController::class, 'myproducts'])->name('myproducts');
    Route::get('/myproducts/{product}/edit', [ProductController::class, 'editmyproducts'])->name('myproducts.edit');
    Route::put('/myproducts/{product}', [ProductController::class, 'updatemyproducts'])->name('myproducts.update');
    Route::delete('/myproducts/{product}', [ProductController::class, 'deletemyproducts'])->name('myproducts.destroy');

    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.addproduct');
    Route::get('/cart/show', [CartController::class, 'showcart'])->name('cart.show');
    Route::delete('/cart/{cart}', [CartController::class, 'deletecartproducts'])->name('cartproduct.destroy');

    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.addproduct');
    Route::get('/wishlist/show', [WishlistController::class, 'showwishlist'])->name('wishlist.show');
    Route::delete('/wishlist/{item}', [WishlistController::class, 'deletewishlistproducts'])->name('wishlistproduct.destroy');
    
    Route::get('/purchaseditems', [PurchasedItemsController::class, 'index'])->name('purchaseditems');
    Route::put('/purchasedItems/{product}', [PurchasedItemsController::class, 'received'])->name('received');
    
    Route::get('/solditems', [SoldItemsController::class, 'index'])->name('solditems');
    Route::put('/solditems/{product}', [SoldItemsController::class, 'shipped'])->name('shipped');

    Route::get('upload-ui', [FileUploadController::class, 'dropzoneUi' ]);
    Route::post('file-upload', [FileUploadController::class, 'dropzoneFileUpload' ])->name('dropzoneFileUpload');

    Route::controller(StripePaymentController::class)->group(function(){
        Route::get('stripe', 'stripe');
        Route::post('stripe', 'stripePost')->name('stripe.post');
    });
});