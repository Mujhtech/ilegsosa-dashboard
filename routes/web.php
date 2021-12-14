<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ConnectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

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
Route::get('/storage-link', function () {
    Artisan::call('storage:link');
});

Route::get('/paystack/handle/callback', [PaymentController::class, 'handleCallback']);

Route::middleware(['auth', 'verify'])->name('user.')->group(function () {

    Route::get('/', DashboardController::class)->name('dashboard');

    Route::get('/update-profile', function () {

        $title = "Profile";
        return view('profile.edit', compact('title'));

    })->name('profile');

    Route::get('/change-password', function () {

        $title = "Profile";
        return view('profile.password', compact('title'));

    })->name('password');

    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcement');

    Route::get('/announcement/create', [AnnouncementController::class, 'create'])->middleware('admin')->name('announcement.create');

    Route::get('/announcement/edit/{id}', [AnnouncementController::class, 'edit'])->middleware('admin')->name('announcement.edit');

    Route::post('/announcement/store', [AnnouncementController::class, 'store'])->middleware('admin')->name('announcement.store');

    Route::get('/members', [MemberController::class, 'index'])->middleware('admin')->name('member');

    Route::get('/member/status/{id}', [MemberController::class, 'status'])->middleware('admin')->name('member.status');

    Route::get('/member/create', [MemberController::class, 'create'])->middleware('admin')->name('member.create');

    Route::get('/member/edit/{id}', [MemberController::class, 'edit'])->middleware('admin')->name('member.edit');

    Route::post('/member/store', [MemberController::class, 'store'])->middleware('admin')->name('member.store');

    Route::post('/member/update', [MemberController::class, 'update'])->middleware('admin')->name('member.update');

    Route::get('/pay-due', [PaymentController::class, 'index'])->name('due');

    Route::get('/transactions', [PaymentController::class, 'transaction'])->middleware('admin')->name('transaction');

    Route::get('/cast-vote', [VoteController::class, 'index'])->name('vote');

    Route::post('/vote', [VoteController::class, 'store'])->name('vote.store');

    Route::get('/connect-with-mates', [ConnectController::class, 'index'])->name('connect');

    Route::post('/message', [ConnectController::class, 'store'])->name('message.store');

    Route::get('/discussion-thread', [DiscussionController::class, 'index'])->name('discussion.index');

    Route::get('/discussion/edit/{id}', [DiscussionController::class, 'edit'])->name('discussion.edit');

    Route::get('/discussion/{slug}', [DiscussionController::class, 'single'])->name('discussion.single');

    Route::get('/create-discussion-thread', [DiscussionController::class, 'create'])->name('discussion.create');

    Route::post('/discussion-store', [DiscussionController::class, 'store'])->name('discussion.store');

    Route::post('/comment-store', CommentController::class)->name('comment.store');

    Route::get('/like/{type}/{id}', LikeController::class)->name('like.store');

    Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');

    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('update.profile');

    Route::post('/change-password', [UserController::class, 'updatePassword'])->name('update.password');

    Route::post('/connect-request-access', [ConnectController::class, 'requestAcess'])->name('connect.request');

});

Route::prefix('auth')->name('auth.')->group(function () {

    Route::get('login', function () {

        $title = "Login";
        return view('auth.login', compact('title'));

    })->name('login');

    Route::get('register', function () {

        $title = "Register";
        return view('auth.register', compact('title'));

    })->name('register');

    Route::get('forgot', function () {

        $title = "Forgot Password";
        return view('auth.forgot', compact('title'));

    })->name('forgot');

    Route::get('verify', [AuthController::class, 'verify'])->name('verify');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('login', [AuthController::class, 'login'])->name('login.request');
    Route::post('forgot', [AuthController::class, 'forgot'])->name('forgot.request');
    Route::post('register', [AuthController::class, 'register'])->name('register.request');
    Route::post('verify', [AuthController::class, 'verifyPost'])->name('verify.request');

});

// File manager

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
