<?php

use App\Http\Middleware\Authenticate;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/projects', [App\Http\Controllers\HomeController::class, 'projects'])->name('projects');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact_form');

Route::get('/mynatur-react-dashboard', [App\Http\Controllers\HomeController::class, 'reactMynaturDashboard'])->name('MyNaturDashboard');

Auth::routes(['register' => false]);
Route::middleware([Authenticate::class])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::resource('project', App\Http\Controllers\ProjectController::class);
    Route::post('project/{id}/upload_logo', [App\Http\Controllers\ProjectController::class, 'uploadLogo'])->name('project.uploadLogo');
    Route::post('project/{id}/upload_banner', [App\Http\Controllers\ProjectController::class, 'uploadBanner'])->name('project.uploadBanner');
    Route::post('project/{id}/upload_image', [App\Http\Controllers\ProjectController::class, 'uploadImage'])->name('project.uploadImage');
    Route::delete('project/{id}/remove_image', [App\Http\Controllers\ProjectController::class, 'removeImage'])->name('project.removeImage');
    Route::resource('technology', App\Http\Controllers\TechnologyController::class);
});
