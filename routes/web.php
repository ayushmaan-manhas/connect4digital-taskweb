<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FootwearController;
use App\Http\Controllers\CategoryController;

//
Route::get('/footwear/{category?}', [FootwearController::class, 'index'])->name('footwear.index');
Route::get('/footwear', [FootwearController::class, 'index'])->name('footwear.index');
Route::get('/clothing/mens/{category?}', [FootwearController::class, 'mensClothingindex'])->name('mensCloth.index');
Route::get('/clothing/womens/{category?}', [FootwearController::class, 'womensClothingindex'])->name('womensCloth.index');




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';































Route::get('/clothing/mens/', [FootwearController::class, 'mensClothingindex'])->name('mensCloth.index');
Route::get('/clothing/mens/shirts', [FootwearController::class, 'mensClothingindex'])->name('mensCloth.shirts');
Route::get('/clothing/mens/hoodies', [FootwearController::class, 'mensClothingindex'])->name('mensCloth.hoodies');
Route::get('/clothing/mens/jackets', [FootwearController::class, 'mensClothingindex'])->name('mensCloth.jackets');

Route::get('/clothing/womens/', [FootwearController::class, 'womensClothingindex'])->name('womensCloth.index');
Route::get('/clothing/womens/skirts', [FootwearController::class, 'womensClothingindex'])->name('womensCloth.skirts');
Route::get('/clothing/womens/ethnics', [FootwearController::class, 'womensClothingindex'])->name('womensCloth.ethnics');
Route::get('/clothing/womens/jewellery', [FootwearController::class, 'womensClothingindex'])->name('womensCloth.jewellery');

Route::get('/footwear/kidsShoes', [FootwearController::class, 'index'])->name('footwear.kidsShoes');
Route::get('/footwear/mensShoes', [FootwearController::class, 'index'])->name('footwear.mensShoes');
Route::get('/footwear/womensShoes', [FootwearController::class, 'index'])->name('footwear.womensShoes');