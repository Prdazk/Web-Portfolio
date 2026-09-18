<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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



Route::get('/', [HomeController::class, 'Home']);

Route::post('/contact', [HomeController::class, 'Contact']);
Route::get('/project-screenview/{id}', [HomeController::class, 'ProjectDetails']);
Route::get('/download-cv', [HomeController::class, 'Download']);

//Route::any('/*', [HomeController::class, 'NotFound']);

//Route::get('*/', [HomeController::class, 'NotFound']);


Route::fallback([HomeController::class, 'NotFound']);


Route::get('/dashboard', function () {
    return view('Backend.page.dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/logout', [AuthController::class, 'Logout']);
    Route::get('/admin/hero', [AdminController::class, 'Hero']);
    Route::post('/admin/add-hero', [AdminController::class, 'AddHero']);
    Route::post('/admin/update-hero', [AdminController::class, 'UpdateHero']);
    Route::delete('/admin/delete-hero/{id}', [AdminController::class, 'DeleteHero']);



    Route::get('/admin/icon-box', [AdminController::class, 'IconBox']);
    Route::post('/admin/add-iconbox', [AdminController::class, 'AddIconBox']);
    Route::post('/admin/update-iconbox', [AdminController::class, 'UpdateIconBox']);
    Route::delete('/admin/delete-iconbox/{id}', [AdminController::class, 'DeleteIconBox']);

    Route::get('/admin/work-experience', [AdminController::class, 'WorkExperience']);
    Route::post('/admin/add-experience', [AdminController::class, 'AddExperience']);
    Route::post('/admin/update-experience', [AdminController::class, 'UpdateExperience']);
    Route::delete('/admin/delete-experience/{id}', [AdminController::class, 'DeleteExperience']);

    Route::get('/admin/edit/experience/{id}', [AdminController::class, 'editExperience']);

    Route::get('/admin/technology', [AdminController::class, 'Technology']);
    Route::post('/admin/add-technology', [AdminController::class, 'AddTechnology']);
    Route::post('/admin/update-technology', [AdminController::class, 'UpdateTechnology']);
    Route::delete('/admin/delete-technology/{id}', [AdminController::class, 'DeleteTechnology']);
    Route::post('/admin/technology/{id}/images', [AdminController::class, 'AddTechnologyImage']);
    Route::delete('/admin/technology/image/{id}', [AdminController::class, 'DeleteTechnologyImage']);

    Route::get('/admin/faq', [AdminController::class, 'FAQ']);
    Route::post('/admin/add-faq', [AdminController::class, 'AddFAQ']);
    Route::post('/admin/update-faq', [AdminController::class, 'UpdateFAQ']);
    Route::delete('/admin/delete-faq/{id}', [AdminController::class, 'DeleteFAQ']);

    Route::get('/admin/stack', [AdminController::class, 'STACK']);
    Route::post('/admin/add-stack', [AdminController::class, 'AddStack']);
    Route::post('/admin/update-stack', [AdminController::class, 'UpdateStack']);
    Route::delete('/admin/delete-stack/{id}', [AdminController::class, 'DeleteStack']);

    Route::get('/admin/product', [AdminController::class, 'Product']);
    Route::post('/admin/add-product', [AdminController::class, 'AddProduct']);
    Route::post('/admin/update-product', [AdminController::class, 'UpdateProduct']);
    Route::delete('/admin/delete-product/{id}', [AdminController::class, 'DeleteProduct']);

    Route::get('/admin/product/gallery', [AdminController::class, 'ProductGallery']);
    Route::post('/admin/add-product-gallery', [AdminController::class, 'AddProductGallery']);
    Route::post('/admin/update-product-gallery', [AdminController::class, 'UpdateProductGallery']);
    Route::delete('/admin/delete-product-gallery/{id}', [AdminController::class, 'DeleteProductGallery']);

    Route::get('/admin/contact', [AdminController::class, 'Contact']);
    Route::delete('/admin/delete-contact/{id}', [AdminController::class, 'DeleteContact']);


});


require __DIR__.'/auth.php';
