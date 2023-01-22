<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Frontend\AuctionController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FavoriteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Frontend\CatalogueController;


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

// Auth routes
require __DIR__.'/auth.php';

Route::middleware(['auth', 'profile_status'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/auctions/{id}/latest-bids', [AuctionController::class, 'latestBids']);

    // View a product from auction page
    Route::get('/auctions/{slug}/{catalogue_slug}/success', [PagesController::class, 'auctionBidSuccess'])->name('auction-product-success');
    Route::get('/auctions/{slug}/{catalogue_slug}', [PagesController::class, 'auctionProduct'])->name('auction-product');
    Route::get('/auction-product-details/{id}', [PagesController::class, 'auctionProductDetails'])->name('auction-product-details');
    // submit auction bid
    Route::post('/auctions/{id}/submit', [AuctionController::class, 'submit']);

    Route::group(
        ['prefix' => 'administrator'],
        function () {
            Route::get('/users', function() {
                return view('admin.administrator.users');
            })->name('users');

            Route::get('/roles', function () {
                return view('admin.administrator.roles');
            })->name('roles');

            Route::get('/permissions', function () {
                return view('admin.administrator.permissions');
            })->name('permissions');
        }
    );


    Route::group(
        ['prefix' => 'settings'],
        function () {

            Route::get('/', function() {
                return view('admin.settings.settings');
            })->name('settings.settings');

            Route::get('/category', function() {
                return view('admin.settings.category');
            })->name('settings.category');

            Route::get('/company', function() {
                return view('admin.settings.company');
            })->name('settings.company');

            Route::get('/status', function() {
                return view('admin.settings.unit');
            })->name('settings.unit');

            Route::get('/priority', function() {
                return view('admin.settings.brand');
            })->name('settings.brand');

            Route::get('/catalog', function() {
                return view('admin.settings.catalog');
            })->name('settings.catalog');

            Route::get('/project-module', function() {
                return view('admin.settings.neighbourhood');
            })->name('settings.neighbourhood');

            Route::get('/subscription', function() {
                return view('admin.settings.subscription');
            })->name('settings.subscription');

            Route::get('/project', function() {
                return view('admin.settings.banner-ad');
            })->name('settings.banner-ad');

            Route::get('/severity', function() {
                return view('admin.settings.made-in');
            })->name('settings.made-in');

        }
    );

    Route::group(
        ['prefix' => 'profile'],
        function () {
            Route::get('/update', function() {
                return view('admin.users.profile-update');
            })->name('profile.update');
        }
    );

    Route::group(
        ['prefix' => 'user'],
        function () {

            Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('frontend.dashboard');
            Route::get('/profile', [PagesController::class, 'profile'])->name('frontend.profile');
            Route::get('/view-profile', [PagesController::class, 'viewProfile'])->name('frontend.view-profile');
            Route::get('/new-advice', [PagesController::class, 'newAdvice'])->name('frontend.new-advice');
            Route::get('/all-advice', [PagesController::class, 'agroAdvicelIst'])->name('frontend.agro-advice-list');
            Route::get('/pdf-advice-data', [PagesController::class, 'pdfAdviceData'])->name('frontend.pdf-advice-data');
        }
    );
});

Route::get('locale-switch',function(Request $request){
    App::setLocale($request->lang);
    session()->put('locale', $request->lang);

    return redirect()->back();
})->name('changeLang');


Route::get('test', function () {
    $auction = \App\Models\Auction::first();
    auth()->user()->notify(new \App\Notifications\NewAuction($auction));
});

Route::get('/phone-verify', [PagesController::class, 'phoneVerify'])->name('phone.verify');


Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/auctions', [PagesController::class, 'auctions'])->name('auctions');
// Route::get('/auctions-category-product/{id}', [PagesController::class, 'auctionCategoryProduct'])->name('auctions');
Route::get('/quotations', [PagesController::class, 'quotations'])->name('quotations');
Route::get('/auctions/{slug}', [PagesController::class, 'auction'])->name('auction');
Route::get('/quotations/{slug}', [PagesController::class, 'quotation'])->name('quotation');
Route::get('/products/{catalogue}/id', [PagesController::class, 'product'])->name('product');
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('about-us');
Route::get('/pricing-plan', [PagesController::class, 'pricingPlan'])->name('frontend.pricing-plan');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');


// API
Route::get('/catalogues/{id}', [CatalogueController::class, 'show']);
Route::get('/category/{category}', [PagesController::class, 'auctionsByCategory'])->name('auctionsByCategory');
