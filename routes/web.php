<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutPanel;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangePass;
use Illuminate\Support\Facades\DB;
//email varification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/',[IndexController::class, 'index'])->name('/');
Route :: get('/about',[AboutPanel::class,'ViewMore'])->name('about');
Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route :: get('/home',[HomeController ::class,'index']);
//Category Cotroller
Route :: get('/category/all',[CategoryController::class,'AllCatagory'])->name('all.category');
Route :: post('/category/add',[CategoryController::class,'StoreCategory'])->name('store.category');
Route :: get('/category/edit/{id}',[CategoryController::class,'Edit']);
Route :: post('/category/update/{id}',[CategoryController::class,'Update']);
Route :: get('softdelete/category/{id}',[CategoryController::class,'SoftDelete']);
Route :: get('category/restore/{id}',[CategoryController::class,'Restore']);
Route :: get('delete/category/{id}',[CategoryController::class,'Delete']);

//For Brand route
Route :: get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
Route :: post('/brand/add',[BrandController::class,'StoreBrand'])->name('store.brand');
Route :: get('/brand/edit/{id}',[BrandController::class,'Edit']);
Route :: post('/brand/update/{id}',[BrandController::class,'Update']);
Route :: get('/brand/delete/{id}',[BrandController::class,'Delete']);

//For Multi image rout
Route :: get('/multi/images',[BrandController::class,'MultiImages'])->name('multi.images');
Route :: post('/multi/add',[BrandController::class,'StoreMultiImage'])->name('store.image');

// Admin all route
Route :: get('/home/hero_section',[WebController::class,'ViewHeader'])->name('home.hero');
Route :: post('/add/hero_section',[WebController::class,'StoreHero'])->name('add.hero');
Route :: get('/hero/edit/{id}',[WebController::class,'EditHero']);
Route :: get('/hero/delete/{id}',[WebController::class,'Delete']);
Route :: get('/hero/add/',[WebController::class,'AddHero'])->name('hero.add');
Route :: post('/hero/update/{id}',[WebController::class,'UpdateHero']);
Route :: get('/home/home_section',[AboutPanel::class,'About_panel'])->name('home.about');
Route :: get('/add/about/',[AboutPanel::class,'AddAbout'])->name('about.add');
Route :: post('/add/about/',[AboutPanel::class,'StoreAbout'])->name('add.about');
Route :: get('/about_panel/edit/{id}',[AboutPanel::class,'EditAboutSection']);
Route :: post('/about/update/{id}',[AboutPanel::class,'UpdateAboutSection']);
Route :: get('/about_panel/delete/{id}',[AboutPanel::class,'DeleteSection']);
Route :: get('/about/inner/',[AboutPanel::class,'ViewAboutInner'])->name('about.inner');

//More landing
Route :: get('/about/more',[AboutPanel::class,'ViewMore'])->name('more.about');
//Change password and user profile
Route :: get('/user/password',[ChangePass::class,'SetPass'])->name('change.password');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users=DB::table('users')->latest()->paginate('10');
    return view('admin.admin_main',compact('users'));
})->name('dashboard');

//user login logout
Route :: get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');
