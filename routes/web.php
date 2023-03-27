<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\Department;
use App\Models\Setting;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Cache;

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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {


    Route::get('/',[ArticleController::class, 'welcome'])->name('welcome');

    Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
        Route::resource('/department', DepartmentController::class);
        Route::resource('/article', ArticleController::class);

        Route::get('/sort', [DepartmentController::class, 'Sort'])->name('Sort');

        Route::get('/addSliderPage/{id}', [ArticleController::class, 'addSliderPage'])->name('addSliderPage');
        Route::post('/createslider', [ArticleController::class, 'createSlider'])->name('createSlider');
        Route::get('/editSliderPage/article={id}/dep={dep_id}', [ArticleController::class, 'editSliderPage'])->name('editSliderPage');
        Route::post('/editslider', [ArticleController::class, 'editSlider'])->name('editSlider');
        Route::post('/deleteslider', [ArticleController::class, 'deleteSlider'])->name('deleteSlider');

        //settings
        Route::get('/settingwebsite', [ArticleController::class, 'settingWebsite'])->name('settingWebsite');
        //editSetting
        Route::post('/editSetting', [ArticleController::class, 'editSetting'])->name('editSetting');

         //terms
         Route::get('/terms', [ArticleController::class, 'terms'])->name('terms');
        //editterms
        Route::post('/editTerms', [ArticleController::class, 'editTerms'])->name('editTerms');

          //pay policies
          Route::get('/paypolicies', [ArticleController::class, 'payPolicies'])->name('payPolicies');
          //edit pay policies
          Route::post('/editPayPolicies', [ArticleController::class, 'editPayPolicies'])->name('editPayPolicies');

          //pay back policies
          Route::get('/paybackpolicies', [ArticleController::class, 'payBackPolicies'])->name('payBackPolicies');
          //edit pay back policies
          Route::post('/editPayBackPolicies', [ArticleController::class, 'editPayBackPolicies'])->name('editPayBackPolicies');
          //about us page
          Route::get('/aboutUsPage/{id}', [ArticleController::class, 'aboutUsPage'])->name('aboutUsPage');

          //editFixedArticles
          Route::post('/editFixedArticles', [ArticleController::class, 'editFixedArticles'])->name('editFixedArticles');
          //best offers
          Route::get('/bestOffers/{id}', [ArticleController::class, 'bestOffers'])->name('bestOffers');
          Route::get('/addBestOffersPage/{id}', [ArticleController::class, 'addBestOffersPage'])->name('addBestOffersPage');
          Route::get('/editBestOffersPage/article={id}/dep={dep_id}', [ArticleController::class, 'editBestOffersPage'])->name('editBestOffersPage');
          //subscribtions
          Route::get('/subscribtions/{id}', [ArticleController::class, 'subscribtions'])->name('subscribtions');
          Route::get('/addSubscribtionPage/{id}', [ArticleController::class, 'addSubscribtionPage'])->name('addSubscribtionPage');
          Route::get('/editSubscribtionPage/article={id}/dep={dep_id}', [ArticleController::class, 'editSubscribtionPage'])->name('editSubscribtionPage');

          //products control routes
          Route::get('/products/{id}', [ArticleController::class, 'products'])->name('products');
          Route::get('/addproductsPage/{id}', [ArticleController::class, 'addproductsPage'])->name('addproductsPage');
          Route::get('/editproductsPage/article={id}/dep={dep_id}', [ArticleController::class, 'editproductsPage'])->name('editproductsPage');
          //contact us requests
          Route::get('/contactUsRequests', [ArticleController::class, 'contactUsRequests'])->name('contactUsRequests');
          Route::get('/showContactUsInfo/{id}', [ArticleController::class, 'showContactUsInfo'])->name('showContactUsInfo');
          Route::post('/editContactUsInfo', [ArticleController::class, 'editContactUsInfo'])->name('editContactUsInfo');
          Route::post('/deleteContactUsInfo', [ArticleController::class, 'deleteContactUsInfo'])->name('deleteContactUsInfo');
          //categories
          Route::get('/Categories', [ArticleController::class, 'Categories'])->name('Categories');
          Route::get('/addCategories', [ArticleController::class, 'addCategories'])->name('addCategories');
          Route::get('/editCategories/{id}', [ArticleController::class, 'editCategories'])->name('editCategories');
          //deleteCategory
          Route::post('/deleteCategory/{id}', [ArticleController::class, 'deleteCategory'])->name('deleteCategory');
          //services routes
          Route::get('/categoryServicies/{id}', [ArticleController::class, 'categoryServicies'])->name('categoryServicies');
          Route::get('/toggleLatestAdded/{id}', [ArticleController::class, 'toggleLatestAdded'])->name('toggleLatestAdded');
          Route::get('/isActiveToggle/{id}', [ArticleController::class, 'isActiveToggle'])->name('isActiveToggle');
          //copouns routes  storeCoupon
          Route::get('/allCoupons', [ArticleController::class, 'allCoupons'])->name('allCoupons');
          Route::get('/addCopounPage', [ArticleController::class, 'addCopounPage'])->name('addCopounPage');
          Route::post('/storeCoupon', [ArticleController::class, 'storeCoupon'])->name('storeCoupon');
          Route::post('/deleteCoupon', [ArticleController::class, 'deleteCoupon'])->name('deleteCoupon');

          //orders routes
          Route::get('/allOrders', [ArticleController::class, 'allOrders'])->name('allOrders');
          Route::get('/editOrderPage/{id}', [ArticleController::class, 'editOrderPage'])->name('editOrderPage');
          Route::post('/editOrderForm', [ArticleController::class, 'editOrderForm'])->name('editOrderForm');
          Route::post('/deleteOrder/{id}', [ArticleController::class, 'deleteOrder'])->name('deleteOrder');
          Route::get('/searchOrder', [ArticleController::class, 'searchOrder'])->name('searchOrder');

          //all product orders
          Route::get('/allProductOrders', [ArticleController::class, 'allProductOrders'])->name('allProductOrders');
          Route::get('/editProductOrderPage/{id}', [ArticleController::class, 'editProductOrderPage'])->name('editProductOrderPage');
          Route::post('/editProductOrderForm', [ArticleController::class, 'editProductOrderForm'])->name('editProductOrderForm');
          Route::post('/deleteProductOrder', [ArticleController::class, 'deleteProductOrder'])->name('deleteProductOrder');
          Route::get('/searchProductOrder', [ArticleController::class, 'searchProductOrder'])->name('searchProductOrder');



        //pdf and excel routes
        Route::get('/export/{id}', [ArticleController::class, 'export'])->name('export');
        Route::get('/downloadpdf/{id}', [ArticleController::class, 'downloadPdf'])->name('downloadPdf');


    });
   // user dashboard
    Route::prefix('user')->middleware(['auth'])->group(function () {
       // Route::get('/home', [HomeUserController::class, 'Userhome'])->name('Userhome');
        Route::post('/editUser', [UserController::class, 'editUser'])->name('editUser');
        Route::post('/editPassword', [UserController::class, 'editPassword'])->name('editPassword');
        // Route::post('/editpassword', [HomeUserController::class, 'editPassword'])->name('editPassword');
        Route::get('/manageorders', [UserController::class, 'manageOrders'])->name('manageOrders');
        Route::get('/manageProductsOrders', [UserController::class, 'manageProductsOrders'])->name('manageProductsOrders');
        Route::get('/getfullcalender', [UserController::class, 'getfullcalender'])->name('getfullcalender');

        //book service pages routes
        Route::get('/bookServicePage/id={id}/type={type}', [PagesController::class, 'bookServicePage'])->name('bookServicePage');
        Route::post('/bookServiceForm', [PagesController::class, 'bookServiceForm'])->name('bookServiceForm');

        //cart controller   deleteFromCard
        Route::get('/cartPage', [CartController::class, 'cartPage'])->name('cartPage');
        Route::get('/addToCart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
        Route::post('/deleteFromCard', [CartController::class, 'deleteFromCard'])->name('deleteFromCard');
        Route::post('/buyCard', [CartController::class, 'buyCard'])->name('buyCard');

    });


     //user pages
     Route::get('/policies/{name?}', [PagesController::class, 'policies'])->name('policies');
     // products browse page
     Route::get('/ourProducts', [PagesController::class, 'ourProducts'])->name('ourProducts');
     Route::get('/show/product/{id}', [PagesController::class, 'ShowProduct'])->name('show.product');
     //contact us page
     Route::get('/contactUs', [PagesController::class, 'contactUs'])->name('contactUs');
     //receive contact requests
     Route::post('/contactUsForm', [PagesController::class, 'contactUsForm'])->name('contactUsForm');
     //servicies page
     Route::get('/servicies', [PagesController::class, 'servicies'])->name('servicies');
     //offers page
     Route::get('/offers', [PagesController::class, 'offers'])->name('offers');
     //changeSelectedProducts
     Route::get('/changeSelectedProducts/{id}', [PagesController::class, 'changeSelectedProducts'])->name('changeSelectedProducts');





    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

    // Route::get('/export/{id}', [ArticleController::class, 'export'])->name('export');
    // Route::get('/downloadpdf/{id}', [ArticleController::class, 'downloadPdf'])->name('downloadPdf');
    // Route::get('/confirmdeletedepartment/{id}', [DepartmentController::class, 'confirmDeleteDepartment'])->name('confirmDeleteDepartment');
    Auth::routes();
});




Route::get('/', function () {

    return redirect('/ar');
});
