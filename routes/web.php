<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RequestPrescriptionController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function() {
    Route::get('/requests',[RequestPrescriptionController::class, 'index'])
    ->name('requests.index');
    Route::get('/respondedRequests',[RequestPrescriptionController::class, 'acceptedIndex'])
    ->name('responseRequests.index');
    Route::get('/posts/create', [RequestPrescriptionController::class, 'create'])
    ->name('requests.create'); 
    Route::put('/requests/{id}/update', [RequestPrescriptionController::class, 'update'])
    ->name('requests.update');
    Route::post('/requests', [RequestPrescriptionController::class, 'store'])
    ->name('requests.store');
    Route::get('/requests/{id}', [RequestPrescriptionController::class, 'show'])
    ->name('requests.show');
    Route::get('/requests/{id}/edit', [RequestPrescriptionController::class, 'edit'])
    ->name('requests.edit');
    Route::delete('/requests/{id}', [RequestPrescriptionController::class, 'destroy'])
    ->name('requests.destroy');

    Route::get('/responses/create', [ResponseController::class, 'create'])
    ->name('responses.create');
    Route::put('/responses/{id}/update', [ResponseController::class, 'update'])
    ->name('responses.update');
    Route::post('/responses/{request_id}', [ResponseController::class, 'store'])
    ->name('responses.store');
    Route::get('/responses/{id}/edit', [ResponseController::class, 'edit'])
    ->name('responses.edit');
    Route::delete('/responses/{id}', [ResponseController::class, 'destroy'])
    ->name('responses.destroy');

    Route::get('/adminRequests',[AdminController::class, 'index'])
    ->name('adminRequests.index');
    Route::get('/adminRespondedRequests',[AdminController::class, 'acceptedIndex'])
    ->name('adminResponseRequests.index');
    Route::get('/users',[AdminController::class, 'userIndex'])
    ->name('user.index');
    Route::put('/users/{id}/update', [AdminController::class, 'update'])
    ->name('users.update');
    Route::post('/responses/email/{request_id}', [AdminController::class, 'store'])
    ->name('emails.store');
    Route::get('/users/{id}', [AdminController::class, 'show'])
    ->name('admin.show');

    

});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
