<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController as user;
use App\Http\Controllers\RoleController as role;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\DashboardController as dashboard;
use App\Http\Controllers\PermissionController as permission;
use App\Http\Controllers\ModerationController as moderation;
use App\Http\Controllers\ContactController as contact;
use App\Http\Controllers\VideoController as video;
use App\Http\Controllers\ShipController as ship;
use App\Http\Controllers\AboutUsController as aboutUs;
use App\Http\Controllers\MissionController as mission;
use App\Http\Controllers\ChairmanController as chairman;
use App\Http\Controllers\ManagementController as management;
use App\Http\Controllers\TopManagementController as topM;
use App\Http\Controllers\MidManagementController as midM;
use App\Http\Controllers\YardManagementController as yardM;
use App\Http\Controllers\OverviewController as overview;
use App\Http\Controllers\SisterConcernController as sister;
use App\Http\Controllers\CarouselController as carousel;
use App\Http\Controllers\TrackRecordController as track;
use App\Http\Controllers\BuyerLogoController as buyer;
use App\Http\Controllers\SisterLogoController as sisterLogo;
use App\Http\Controllers\CompanyInfoController as company;
use App\Http\Controllers\HistoryController as history;
use App\Http\Controllers\FrontMenuController as frontMenu;
use App\Http\Controllers\TextController as text;
use App\Http\Controllers\ProjectController as project;
use App\Http\Controllers\SisterController as sisterC;
use App\Http\Controllers\PageController as page;
use App\Http\Controllers\CareerController as career;
use App\Http\Controllers\CircularController as circular;
use App\Http\Controllers\HomeController as home;

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
Route::get('register', [auth::class,'signUpForm'])->name('register');
Route::post('register', [auth::class,'signUpStore'])->name('register.store');
Route::get('login', [auth::class,'signInForm'])->name('login');
Route::post('login', [auth::class,'signInCheck'])->name('login.check');
Route::get('logout', [auth::class,'signOut'])->name('logOut');

Route::post('image-upload', [page::class, 'storeImage'])->name('image.upload');
Route::get('front_menu', [frontMenu::class, 'index'])->name('front_menu.index');
Route::post('menu_save_update/{id?}', [frontMenu::class, 'save_update'])->name('front_menu.save');
Route::get('front_menu/mss', [frontMenu::class, 'mss'])->name('front_menu.mss');
Route::get('front_menu/delete/{id}', [frontMenu::class, 'destroy'])->name('front_menu.detroy');
Route::get('/page/{slug}', [home::class,'page'])->name('front.page');

Route::get('career', [home::class, 'career'])->name('career');
Route::get('job-apply/{id}', [home::class, 'applyJob'])->name('jobApply');
Route::post('career/store', [career::class, 'store'])->name('career.store');
Route::post('contact/store', [contact::class, 'store'])->name('contact.store');
Route::get('contact', [home::class, 'contact'])->name('contact');
Route::get('sister', [home::class, 'sister'])->name('sister');
Route::get('management', [home::class, 'management'])->name('management');
Route::get('about', [home::class, 'about'])->name('about');
Route::get('chairman', [home::class, 'chairman'])->name('chairman');
Route::get('trackRecord', [home::class, 'trackRecord'])->name('trackRecord');
Route::get('overview', [home::class, 'overview'])->name('overview');
Route::get('/yard', [home::class, 'moderation'])->name('yard');
Route::get('videos', [home::class, 'video'])->name('videos');
Route::get('gallery', [ship::class, 'gallery'])->name('gallery');
Route::get('gallery/filter/{category}', [ship::class, 'filter'])->name('frontend.gallery.filter');
// Route::get('/home', [home::class, 'index'])->name('home');
Route::get('/', [home::class, 'index'])->name('home');

Route::middleware(['checkauth'])->prefix('admin')->group(function(){
    Route::get('dashboard', [dashboard::class,'index'])->name('dashboard');
    Route::get('change_password', [user::class,'index'])->name('change_password');
});
Route::middleware(['checkrole'])->prefix('admin')->group(function(){
    Route::resource('user', user::class);
    Route::resource('role', role::class);
    Route::resource('ship-info', ship::class);
    Route::resource('industry', overview::class);
    Route::resource('team', management::class);
    Route::resource('top', topM::class);
    Route::resource('mid', midM::class);
    Route::resource('yard', yardM::class);
    Route::resource('sister-concern', sister::class);
    Route::resource('mission', mission::class);
    Route::resource('chairman', chairman::class);
    Route::resource('moderation', moderation::class);
    Route::resource('carousel', carousel::class);
    Route::resource('info', company::class);
    Route::resource('sister-logo', sisterLogo::class);
    Route::resource('buyer-logo', buyer::class);
    Route::resource('track-record', track::class);
    Route::resource('history', history::class);
    Route::resource('about-us', aboutUs::class);
    Route::resource('page', page::class);
    Route::resource('text', text::class);
    Route::resource('sisterC', sisterC::class);
    Route::resource('project', project::class);
    Route::resource('circular', circular::class);
    Route::resource('video', video::class);
    
    Route::delete('applicants/{id}', [career::class, 'destroy'])->name('applicants.destroy');
    Route::delete('contact/{id}', [contact::class, 'destroy'])->name('contact.destroy');
    Route::get('contact', [contact::class, 'index'])->name('contactList');
    Route::get('applicants', [career::class, 'index'])->name('applicants');

    Route::get('permission/{role}', [permission::class,'index'])->name('permission.list');
    Route::post('permission/{role}', [permission::class,'save'])->name('permission.save');
});

// Route::get('/', function () {
//     return view('frontend.home');
// })->name('home');
// Route::get('about', function () {
//     return view('frontend.about.about');
// })->name('about');
// Route::get('chairman', function () {
//     return view('frontend.chairman.chairman');
// })->name('chairman');
// Route::get('sister-concern', function () {
//     return view('frontend.sister-concern.sister');
// })->name('sister');
// Route::get('contact', function () {
//     return view('frontend.contact.contact');
// })->name('contact');
// Route::get('moderation', function () {
//     return view('frontend.moderation.moderation');
// })->name('moderation');
// Route::get('management', function () {
//     return view('frontend.management.management');
// })->name('management');
// Route::get('track-record', function () {
//     return view('frontend.track-record.track');
// })->name('track');
