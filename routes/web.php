<?php

use App\Livewire\App\Brand;
use App\Livewire\App\Main;
use App\Livewire\App\User\Profile;
use App\Livewire\App\User\Upload;
use App\Livewire\Auth\Login;
use App\Livewire\Site\Index;
use App\Livewire\Site\ProfileList;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', Index::class);
Route::get('/profile-list/{category}', ProfileList::class)->name('profile-list');
Route::get('/profile/{slug}', \App\Livewire\Site\Profile::class)->name('site.profile');

Route::get('/login', Login::class)->name('login');
Route::get('/logout',function(){
    Auth::logout();
})->name('logout');

Route::prefix('/app')->middleware('auth')->group(function () {
    Route::get('/', Main::class)->name('main');
    Route::get('/uploads', Upload::class)->name('uploads');
    Route::get('/profile', Profile::class)->name('profile');
});
