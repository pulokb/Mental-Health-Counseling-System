<?php

use App\Http\Controllers\Common\CKEditorController;
use App\Http\Controllers\Frontend\ContactFeedbackController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\User\PulokController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ***************************** Frontend Routes *****************************

// User authentication routes (prefix: user)
Route::group(['prefix' => config('user.user_route_prefix'), 'as' => 'user.'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register'); // Show the registration form
Route::post('/register', [RegisterController::class, 'register'])->name('register.post'); // Handle form submission

// Routes accessible without authentication
Route::group(['middleware' => ['blockIp', 'localaization']], function () {

    // Homepage route
    Route::get('/', [IndexController::class, 'index'])->name('index');

    // Change Password Routes
    Route::get('change-password', [ProfileController::class, 'changePasswordView'])->name('change.password');
    Route::post('change-password', [ProfileController::class, 'changePassword'])->name('change.password');

    // Profile Routes
    Route::get('profile', [ProfileController::class, 'profileView'])->name('profilev'); // Fixed profile route
    Route::post('profile', [ProfileController::class, 'profileChange'])->name('profilec');

    // Contact and Feedback routes
    Route::get('contact', [ContactFeedbackController::class, 'contact'])->name('contact');
    Route::post('feedback', [ContactFeedbackController::class, 'submitFeedback'])->name('submit.feedback');
    Route::get('feedback', [ContactFeedbackController::class, 'feedback'])->name('feedback');

    // PulokController routes (symptoms, suggestions, etc.)
    Route::get('queryform', [PulokController::class, 'queryform'])->name('queryform');
    Route::get('autoreport', [PulokController::class, 'autoreport'])->name('autoreport');
    Route::post('autoreport', [PulokController::class, 'autoreport'])->name('autoreport');
    Route::get('response', [PulokController::class, 'response'])->name('response.get');
    Route::post('response', [PulokController::class, 'response'])->name('response.post');

    // Route::post('/autoreport/store', [PulokController::class, 'store'])->name('autoreport.store');

    Route::get('symptoms', [PulokController::class, 'symptoms'])->name('symptoms');
    Route::get('symptoms/{id}', [PulokController::class, 'symptomsDetails'])->name('symptom.details');
    Route::get('suggestions', [PulokController::class, 'suggestions'])->name('suggestions');
    Route::get('suggestions/{id}', [PulokController::class, 'suggestionDetails'])->name('suggestion.details');
    Route::get('faq', [PulokController::class, 'faq'])->name('faq');
    // Route::get('blogdetails', [PulokController::class, 'details'])->name('blog.details');
    Route::get('search', [SearchController::class, 'search'])->name('search');

    // Pages routes (e.g., About)
    Route::get('about', [PageController::class, 'about'])->name('about');

    // CKEditor Image Upload
    Route::post('ckeditor/image-upload', [CKEditorController::class, 'imageUpload'])->name('ckeditor.image.upload');

    // Language change route
    Route::get('/language/{locale}', [IndexController::class, 'changeLanguage'])->name('changeLanguage');
});

// ***************************** Admin Routes *****************************

// Group admin routes under the 'admin' prefix
Route::group(['prefix' => 'admin'], function () {
    Route::resource('newTest2s', App\Http\Controllers\Admin\NewTest2Controller::class, ['as' => 'admin']);
    Route::resource('userQueries', App\Http\Controllers\Admin\UserQueryController::class, ['as' => 'admin']);
    Route::resource('doctorFeedbacks', App\Http\Controllers\Admin\DoctorFeedbackController::class, ['as' => 'admin']);
    // Route::post('doctorFeedbacks', [App\Http\Controllers\Admin\DoctorFeedbackController::class, 'store'])->name('admin.doctorFeedbacks.store');
    Route::resource('symptoms', App\Http\Controllers\Admin\SymptomsController::class, ['as' => 'admin']);
    Route::resource('suggestions', App\Http\Controllers\Admin\SuggestionsController::class, ['as' => 'admin']);
});
