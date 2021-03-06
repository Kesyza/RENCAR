<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\MobilController;

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
    return view('welcome');
});

// supaya tidak bisa register ataupun registernya hilang
Auth::routes( 
    [
        'register' => true
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // hanya untuk role admin
// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
//     Route::get('/', function(){
//         return 'halaman admin';
//     });

//     Route::get('profile', function(){
//         return 'halaman profile admin';
//     });
// });

// // hanya untuk role pengguna atau pengunjung
// Route::group(['prefix' => 'pengguna', 'middleware' => ['auth', 'role:pengguna']], function(){
//     Route::get('/', function(){
//         return 'halaman pengguna';
//     });

//     Route::get('profile', function(){
//         return 'halaman profile pengguna';
//     });
// });

// // hanya contoh 
// Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
//     Route::get('buku', function(){
//         return view ('buku.index');
//     })->middleware(['role:admin|pengguna']);

//     Route::get('pengarang', function(){
//         return view ('pengarang.index');
//     })->middleware(['role:admin']);
// });

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    
    Route::resource('merek', MerekController::class)->middleware(['role:admin']);
    Route::resource('mobil', MobilController::class)->middleware(['role:admin']);

});