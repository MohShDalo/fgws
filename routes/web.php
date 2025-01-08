<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'index'])->name('user.password.change');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

Route::get('/home/post/{post}', [App\Http\Controllers\HomeController::class, 'showPost'])->name('home.post.show');
Route::get('/home/job/{job}', [App\Http\Controllers\HomeController::class, 'showJob'])->name('home.job.show');
Route::get('/home/freelancer/{freelancer}', [App\Http\Controllers\HomeController::class, 'showFreelancer'])->name('home.freelancer.show');


Route::prefix('cms')->group(function(){
	Route::get('', [App\Http\Controllers\HomeController::class, 'cms'])->name('cms');

    Route::resource('/user', App\Http\Controllers\Admin\UserController::class);
    Route::get('/user/export/excel', [App\Http\Controllers\Admin\UserController::class, 'exportExcel'])->name('user.export.excel');

    Route::resource('/freelancer', App\Http\Controllers\Admin\FreelancerController::class);
    Route::get('/freelancer/export/excel', [App\Http\Controllers\Admin\FreelancerController::class, 'exportExcel'])->name('freelancer.export.excel');

    Route::resource('/manger', App\Http\Controllers\Admin\MangerController::class);
    Route::get('/manger/export/excel', [App\Http\Controllers\Admin\MangerController::class, 'exportExcel'])->name('manger.export.excel');

    Route::resource('/skill', App\Http\Controllers\Admin\SkillController::class);
    Route::get('/skill/export/excel', [App\Http\Controllers\Admin\SkillController::class, 'exportExcel'])->name('skill.export.excel');

    Route::resource('/certificate', App\Http\Controllers\Admin\CertificateController::class);
    Route::get('/certificate/export/excel', [App\Http\Controllers\Admin\CertificateController::class, 'exportExcel'])->name('certificate.export.excel');

    Route::resource('/education', App\Http\Controllers\Admin\EducationController::class);
    Route::get('/education/export/excel', [App\Http\Controllers\Admin\EducationController::class, 'exportExcel'])->name('education.export.excel');

    Route::resource('/language', App\Http\Controllers\Admin\LanguageController::class);
    Route::get('/language/export/excel', [App\Http\Controllers\Admin\LanguageController::class, 'exportExcel'])->name('language.export.excel');

    Route::resource('/experience', App\Http\Controllers\Admin\ExperienceController::class);
    Route::get('/experience/export/excel', [App\Http\Controllers\Admin\ExperienceController::class, 'exportExcel'])->name('experience.export.excel');

    Route::resource('/portfolio', App\Http\Controllers\Admin\PortfolioController::class);
    Route::get('/portfolio/export/excel', [App\Http\Controllers\Admin\PortfolioController::class, 'exportExcel'])->name('portfolio.export.excel');

    Route::resource('/reference', App\Http\Controllers\Admin\ReferenceController::class);
    Route::get('/reference/export/excel', [App\Http\Controllers\Admin\ReferenceController::class, 'exportExcel'])->name('reference.export.excel');

    Route::resource('/post', App\Http\Controllers\Admin\PostController::class);
    Route::get('/post/export/excel', [App\Http\Controllers\Admin\PostController::class, 'exportExcel'])->name('post.export.excel');

    Route::resource('/job', App\Http\Controllers\Admin\JobController::class);
    Route::get('/job/export/excel', [App\Http\Controllers\Admin\JobController::class, 'exportExcel'])->name('job.export.excel');

    Route::resource('/comment', App\Http\Controllers\Admin\CommentController::class);
    Route::get('/comment/export/excel', [App\Http\Controllers\Admin\CommentController::class, 'exportExcel'])->name('comment.export.excel');

    Route::resource('/offer', App\Http\Controllers\Admin\OfferController::class);
    Route::get('/offer/export/excel', [App\Http\Controllers\Admin\OfferController::class, 'exportExcel'])->name('offer.export.excel');
    Route::get('/offer/approve/{offer}', [App\Http\Controllers\Admin\OfferController::class, 'approve'])->name('offer.approve');

    Route::get('/reaction/store', [App\Http\Controllers\Admin\ReactionController::class, 'store'])->name('reaction.store');
    // Route::resource('/reaction', App\Http\Controllers\Admin\ReactionController::class);
    // Route::get('/reaction/export/excel', [App\Http\Controllers\Admin\ReactionController::class, 'exportExcel'])->name('reaction.export.excel');

    Route::resource('/chat', App\Http\Controllers\Admin\ChatController::class);
    Route::get('/chat/export/excel', [App\Http\Controllers\Admin\ChatController::class, 'exportExcel'])->name('chat.export.excel');

    Route::resource('/message', App\Http\Controllers\Admin\MessageController::class);
    Route::get('/message/export/excel', [App\Http\Controllers\Admin\MessageController::class, 'exportExcel'])->name('message.export.excel');
});
