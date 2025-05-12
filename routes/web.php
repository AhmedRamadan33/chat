<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\website\HomeController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// go to home page
Route::get('/login', function () {
    return view('auth.login');
});

Route::post('test', [AuthenticatedSessionController::class, 'store'])->name('login.test');
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::get('Conversations', [ChatController::class, 'allConversations'])->name('allConversations');
Route::get('chat/show/{id}', [ChatController::class, 'show'])->name('chat.show');




// go to home page
Route::get('/', function () {
    return view('Dashboard.Admin.index');
});



Route::group([], function () {
    Route::get('user/list', CreateChat::class)->name('user.list');
    Route::get('user/chat', Main::class)->name('user.chat');
});

