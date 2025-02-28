<?php 

use Illuminate\Support\Facades\Route; // For Route facade
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController; // Add this line



// Home page route using the controller
Route::get('/', [HomeController::class, 'index'])->name('home');

// About page route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Article details by ID (Blog post route)
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');

// Greeting page with a dynamic name parameter
Route::get('/greeting/{name}', function ($name) {
    return view('greeting', ['name' => $name]);
})->name('greeting');

// Legal pages with restricted subsections
Route::get('legal/{subsection}', function ($subsection) {
    return view('legal', ['subsection' => $subsection]);
})->where('subsection', 'tos|privacy')->name('legal');

// Category page route
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

// Tag page route
Route::get('/tag/{slug}', [TagController::class, 'show'])->name('tag.show');

// Search page route
Route::get('/search', [SearchController::class, 'showSearchPage'])->name('search.page');
Route::get('/search/results', [SearchController::class, 'searchResults'])->name('search.results'); // for search results
