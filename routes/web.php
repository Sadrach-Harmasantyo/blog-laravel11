<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterUserController;
use App\Models\Blog;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'title'=>'Home Page'
    ]);
});

// Route::get('/about', function () {
//     return view('about', [
//         'title'=>'About Page',
//         'nama'=>'laravel ganteng'
//     ]);
// });

Route::get('/about', [AboutController::class,'index']);

Route::get('/blog', function () {
    return view('blog', [
        'title'=>'Blog Page',
        'blogs'=> Blog::all()
    ]);
});

Route::get('/blog/{id}', function ($id) {
    return view('blog-detail', [
        'title'=>'Blog Detail Page',
        'blog'=> Blog::find($id)
    ]);
});

// Route::get('/contact', function () {
//     return view('contact', [
//         'title'=>'Contact Page',
//         'email'=>'lqZ2w@example.com',
//         'telp'=>'08123456789'
//     ]);
// });

Route::get('/contact', ContactController::class);

Route::get('/test', fn()=> view('test')
    // ->with('title', 'Test Page')
);

//POST ROUTE
// Route::get('/posts', [PostController::class,'index']);
// Route::get('/posts/create', [PostController::class,'create']);
// Route::post('/posts', [PostController::class,'store']);
// Route::get('/post/{id}', [PostController::class,'show']);
// Route::get('/posts/{id}/edit', [PostController::class,'edit']);
// Route::put('/posts/{id}', [PostController::class,'update']);
// Route::delete('/post/{id}', [PostController::class,'destroy']);
Route::view('/welcome', 'welcome');
// Route::resource('/posts', PostController::class);

// Route::get('/register', [RegisterUserController::class,'register'])->name('register');
// Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

// Route::get('/login', [LoginUserController::class,'login'])->name('login');
// Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');

//middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class,'create'])->name('posts.create');
    Route::post('/posts', [PostController::class,'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class,'edit'])->can('update', 'post')->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update');
    Route::delete('/post/{post}', [PostController::class,'destroy'])->name('posts.destroy'); 
    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

    Route::middleware('is-admin')->group(function () {
        // Route::get('/admin', fn()=> 'You are logged as a Admin')->can('is-admin')->name('admin');
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/admin/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');
        Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');
    });
});

Route::get('/posts', [PostController::class,'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class,'show'])->name('posts.show');
// Route::get('/posts/{post}', [PostController::class,'show'])->middleware('can-view-post')->name('posts.show');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class,'register'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginUserController::class,'login'])->name('login');
    Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');
});

//edit routes