<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

// Public routes
Route::get('/', function () {
    return 'Laravel is working!';
});

Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContactForm'])->name('contact.send');
Route::post('/newsletter', [HomeController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');

// Facilities routes
Route::get('/facilities/restaurant', [HomeController::class, 'restaurant'])->name('facilities.restaurant');
Route::get('/facilities/swimming-pool', [HomeController::class, 'swimmingPool'])->name('facilities.swimming-pool');
Route::get('/facilities/spa', [HomeController::class, 'spa'])->name('facilities.spa');
Route::get('/facilities/fitness', [HomeController::class, 'fitness'])->name('facilities.fitness');

// Room routes
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
Route::post('/rooms/search', [RoomController::class, 'search'])->name('rooms.search');

// Authentication routes
Route::get('/login', function () { return view('auth.login'); })->name('login')->middleware('guest');
Route::post('/login', function (Illuminate\Http\Request $request) { 
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
 
    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
 
        return redirect()->intended('/');
    }
 
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
})->name('login.post');

Route::get('/register', function () { return view('auth.register'); })->name('register')->middleware('guest');
Route::post('/register', function (Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    
    $user = \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);
    
    Auth::login($user);
    
    return redirect('/');
})->name('register.post');

Route::post('/logout', function (Illuminate\Http\Request $request) {
    Auth::logout();
    
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    
    return redirect('/');
})->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    // User profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Reservation routes
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('/rooms/{room}/reserve', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::patch('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel'])->name('reservations.cancel');
    
    // Testimonial routes
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
});

// Admin routes
Route::middleware(['auth', \App\Http\Middleware\IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Admin room management
    Route::resource('rooms', \App\Http\Controllers\Admin\RoomController::class);
    
    // Admin reservation management
    Route::resource('reservations', \App\Http\Controllers\Admin\ReservationController::class);
    
    // Admin testimonial management
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    
    // Admin gallery management
    Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
    
    // Admin user management
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    
    // Admin image upload
    Route::get('/upload-image', [HomeController::class, 'uploadForm'])->name('image.form');
    Route::post('/upload-image', [HomeController::class, 'uploadImage'])->name('image.upload');
});

Route::get('/storage/image/{path}', function ($path) {
    $fullPath = storage_path('app/public/' . $path);
    
    if (file_exists($fullPath)) {
        return response()->file($fullPath);
    }
    
    abort(404);
})->where('path', '.*')->name('storage.image');


