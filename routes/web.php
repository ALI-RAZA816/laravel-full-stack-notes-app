<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('login');
})->name("login");

Route::get('register', function () {
    return view('register');
})->name('register');

Route::get('reset', function () {
    return view('resetpassword');
})->name('resetpassword');

Route::get('otpform',function(){
    return view('otpform');
})->middleware('OtpRequest')->name('otpform');

Route::get('changepassword', function () {
    return view('changepassword');
})->middleware('OtpVarified')->name('changepassword');


Route::controller(CategoryController::class)->group(function(){
    Route::post('storecategory','storeCategory')->name('post.category');
    Route::get('category','fetchCategory')->name('category');
    Route::get('deletecategory/{id}','deleteCategory')->middleware('can:islogin')->name('delete.category');
    Route::get('editcategory/{id}','fetchSingle')->middleware('can:isAdmin')->name('edit.post');
    Route::put('update/{id}','update')->name('update.post');
});

Route::controller(NoteController::class)->group(function(){
    Route::post('addnote', 'addnotes')->name('add.notes');
    Route::get('dashboard/{userid}', 'fetchNotes')->middleware('can:islogin,isNotes')->name('dashboard');
    Route::get('editnote/{update}/{user}', 'singleNote')->name('editnote');
    Route::put('updatenote/{update}/{user}', 'updateNote')->name('note.update');//
    Route::get('delete/{id}', 'deleteNote')->middleware('can:islogin')->name('note.delete');
    Route::get('star/{id}', 'favourate')->middleware('can:islogin')->name('note.star');
    Route::get('removestar/{id}', 'removefavourate')->middleware('can:islogin')->name('note.remove');
    Route::get('favourate', 'fetchfavourate')->middleware('can:islogin')->name('favourate');
    Route::get('single/{update}/{user}', 'singleView')->name('single');
    Route::get('add-note', 'fetchCategories')->middleware('can:islogin')->name('addnote');
    Route::get('search', 'search')->middleware('can:islogin')->name('search');
});

Route::controller(UserController::class)->group(function(){
    Route::get('users','allusers')->middleware('can:isAdmin')->name('users');
    Route::post('createaccount','createaccount')->name('createaccount');
    Route::post('loginaccount','login')->name('login.page');
    Route::get('logoutaccount/{id}','logoutaccount')->name('logoutaccount.page');
    Route::get('setting/{id}','singleuser')->middleware('can:isAdmin')->name('setting');
    Route::put('updateuser/{id}','updateuser')->name('update.user');
    Route::get('searchuser','searchUser')->middleware('can:islogin')->name('search.user');
    Route::get('deleteuser/{id}','deleteUser')->name('user.delete');
    Route::get('profile/{id}','profile')->middleware('can:islogin,isNotes,isAdmin')->name('profile');
    Route::put('updateprofile/{id}','profileSetting')->name('profile.user');
});

Route::controller(ResetController::class)->group(function(){
    Route::post('getotp','getOtp')->name('reset.password');
    Route::post('otpform', 'verifyOTP')->name('verify.otp');
    Route::post('change', 'setnewpassword')->name('change.password');
});
