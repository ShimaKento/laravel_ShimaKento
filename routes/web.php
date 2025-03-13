<?php

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

//タイトル表示
Route::get('/', function () {
    return view('auth.login');
});

/**/

/*
*/
//ユーザー情報表示 (twitter)
//Route::get('/twitterUsers', [UserController::class,'index']);

use App\Http\Controllers\TestController;
Route::get('/msg', [TestController::class,'message']);

use App\Http\Controllers\ProfileController;
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//ユーザー情報表示 (mydatabase)
//use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

//Route::get('/mypost', [UserController::class,'mypost']);
Route::get('/mypost', [PostController::class,'mypost'])->name('mypost')->middleware('auth');
Route::get('/ourpost', [PostController::class,'ourpost'])->name('ourpost')->middleware('auth');
Route::get('/postpage', [PostController::class,'postpage'])->name('postpage')->middleware('auth');
Route::post('/ourpost', [PostController::class,'newpost'])->name('newpost')->middleware('auth');
Route::get('/onlypost', [PostController::class,'onlypost'])->name('onlypost')->middleware('auth');
Route::post('/onlypost', [PostController::class,'replypaste'])->name('replypaste')->middleware('auth');
Route::get('/reply', [PostController::class,'reply'])->name('reply')->middleware('auth');
Route::post('/reply', [PostController::class,'morereply'])->name('morereply')->middleware('auth');