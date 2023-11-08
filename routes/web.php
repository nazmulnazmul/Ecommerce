<?php


use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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



Route::controller(FrontendController::class)->group(function(){
    Route::get('/', 'Index')->name('index');
});


Route::controller(ClientController::class)->group(function(){
    Route::get('/category/{id}/{slug}', 'CategortPage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('product');
    Route::get('/new-release', 'NewRelease')->name('newrelease');
});


Route::middleware('auth', 'role:user')->group(function(){
    Route::controller(ClientController::class)->group(function(){
        Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
        Route::post('/add-product-cart', 'AddProductToCart')->name('addproductcart');
        Route::get('/checkout', 'CheckOut')->name('checkout');

        Route::get('/shipping-address', 'GetShippingAddress')->name('shippingaddress');
        Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');
        Route::post('/place-order', 'PlaceOrder')->name('placeorder');

        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/user-profile/pending-orders', 'PendingOrders')->name('pendingorders');
        
        Route::get('/user-profile/history', 'History')->name('history');
        Route::get('/todays-deal', 'ToDaysDeal')->name('todaysdeal');
        Route::get('/customer-service', 'CustomerService')->name('customerservice');
        Route::get('/remove-cart-item/{id}', 'RemoveCartItem')->name('removeitem');
    });
    
});



Route::middleware(['auth', 'role:admin'])->group(function(){
    

    // DashboardController
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin/logout', 'destroy')->name('adminLogout');
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
        
    });
    

    // CategoryController
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/admin/all-category', 'Index')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/store-category', 'SoterCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'Editcategory')->name('editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
    });


    // SubCategoryController
    Route::controller(SubCategoryController::class)->group(function(){
        Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'EditSubCategory')->name('editsubcategory');
        Route::post('/admin/update-subcategory', 'UpdateSubCate')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCat')->name('deletesubcategory');
    });

    // ProductController
    Route::controller(ProductController::class)->group(function(){
        Route::get('/admin/all-product', 'Index')->name('allproduct');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct'); 
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product-img/{id}', 'EditPorduct')->name('editproductimg');
        Route::post('/admin/update-product-img/', 'UpdateProductImg')->name('updateproductimg');
        Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
        Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
    });


    // OrderController
    Route::controller(OrderController::class)->group(function(){
        Route::get('/admin/pending-order', 'Index')->name('pendingorder');
    });

    
});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
