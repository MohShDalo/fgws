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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'index'])->name('user.password.change');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
Route::prefix('cms')->group(function(){
	Route::get('', [App\Http\Controllers\HomeController::class, 'cms'])->name('cms');

    Route::resource('/user', App\Http\Controllers\Admin\UserController::class);
    Route::get('/user/export/excel', [App\Http\Controllers\Admin\UserController::class, 'exportExcel'])->name('user.export.excel');
    Route::get('/user/report', [App\Http\Controllers\Admin\UserController::class, 'reportPage'])->name('user.report');

    Route::resource('/freelancer', App\Http\Controllers\Admin\FreelancerController::class);
    Route::get('/freelancer/export/excel', [App\Http\Controllers\Admin\FreelancerController::class, 'exportExcel'])->name('freelancer.export.excel');
    Route::get('/freelancer/report', [App\Http\Controllers\Admin\FreelancerController::class, 'reportPage'])->name('freelancer.report');

    Route::resource('/manger', App\Http\Controllers\Admin\MangerController::class);
    Route::get('/manger/export/excel', [App\Http\Controllers\Admin\MangerController::class, 'exportExcel'])->name('manger.export.excel');
    Route::get('/manger/report', [App\Http\Controllers\Admin\MangerController::class, 'reportPage'])->name('manger.report');

    Route::resource('/skill', App\Http\Controllers\Admin\SkillController::class);
    Route::get('/skill/export/excel', [App\Http\Controllers\Admin\SkillController::class, 'exportExcel'])->name('skill.export.excel');
    Route::get('/skill/report', [App\Http\Controllers\Admin\SkillController::class, 'reportPage'])->name('skill.report');

    Route::resource('/certificate', App\Http\Controllers\Admin\CertificateController::class);
    Route::get('/certificate/export/excel', [App\Http\Controllers\Admin\CertificateController::class, 'exportExcel'])->name('certificate.export.excel');
    Route::get('/certificate/report', [App\Http\Controllers\Admin\CertificateController::class, 'reportPage'])->name('certificate.report');

    Route::resource('/education', App\Http\Controllers\Admin\EducationController::class);
    Route::get('/education/export/excel', [App\Http\Controllers\Admin\EducationController::class, 'exportExcel'])->name('education.export.excel');
    Route::get('/education/report', [App\Http\Controllers\Admin\EducationController::class, 'reportPage'])->name('education.report');

    Route::resource('/language', App\Http\Controllers\Admin\LanguageController::class);
    Route::get('/language/export/excel', [App\Http\Controllers\Admin\LanguageController::class, 'exportExcel'])->name('language.export.excel');
    Route::get('/language/report', [App\Http\Controllers\Admin\LanguageController::class, 'reportPage'])->name('language.report');

    Route::resource('/experience', App\Http\Controllers\Admin\ExperienceController::class);
    Route::get('/experience/export/excel', [App\Http\Controllers\Admin\ExperienceController::class, 'exportExcel'])->name('experience.export.excel');
    Route::get('/experience/report', [App\Http\Controllers\Admin\ExperienceController::class, 'reportPage'])->name('experience.report');

    Route::resource('/portfolio', App\Http\Controllers\Admin\PortfolioController::class);
    Route::get('/portfolio/export/excel', [App\Http\Controllers\Admin\PortfolioController::class, 'exportExcel'])->name('portfolio.export.excel');
    Route::get('/portfolio/report', [App\Http\Controllers\Admin\PortfolioController::class, 'reportPage'])->name('portfolio.report');

    Route::resource('/reference', App\Http\Controllers\Admin\ReferenceController::class);
    Route::get('/reference/export/excel', [App\Http\Controllers\Admin\ReferenceController::class, 'exportExcel'])->name('reference.export.excel');
    Route::get('/reference/report', [App\Http\Controllers\Admin\ReferenceController::class, 'reportPage'])->name('reference.report');

    Route::resource('/post', App\Http\Controllers\Admin\PostController::class);
    Route::get('/post/export/excel', [App\Http\Controllers\Admin\PostController::class, 'exportExcel'])->name('post.export.excel');
    Route::get('/post/report', [App\Http\Controllers\Admin\PostController::class, 'reportPage'])->name('post.report');

    Route::resource('/job', App\Http\Controllers\Admin\JobController::class);
    Route::get('/job/export/excel', [App\Http\Controllers\Admin\JobController::class, 'exportExcel'])->name('job.export.excel');
    Route::get('/job/report', [App\Http\Controllers\Admin\JobController::class, 'reportPage'])->name('job.report');

    Route::resource('/comment', App\Http\Controllers\Admin\CommentController::class);
    Route::get('/comment/export/excel', [App\Http\Controllers\Admin\CommentController::class, 'exportExcel'])->name('comment.export.excel');
    Route::get('/comment/report', [App\Http\Controllers\Admin\CommentController::class, 'reportPage'])->name('comment.report');

    Route::resource('/offer', App\Http\Controllers\Admin\OfferController::class);
    Route::get('/offer/export/excel', [App\Http\Controllers\Admin\OfferController::class, 'exportExcel'])->name('offer.export.excel');
    Route::get('/offer/report', [App\Http\Controllers\Admin\OfferController::class, 'reportPage'])->name('offer.report');

    Route::resource('/reaction', App\Http\Controllers\Admin\ReactionController::class);
    Route::get('/reaction/export/excel', [App\Http\Controllers\Admin\ReactionController::class, 'exportExcel'])->name('reaction.export.excel');
    Route::get('/reaction/report', [App\Http\Controllers\Admin\ReactionController::class, 'reportPage'])->name('reaction.report');

    Route::resource('/chat', App\Http\Controllers\Admin\ChatController::class);
    Route::get('/chat/export/excel', [App\Http\Controllers\Admin\ChatController::class, 'exportExcel'])->name('chat.export.excel');
    Route::get('/chat/report', [App\Http\Controllers\Admin\ChatController::class, 'reportPage'])->name('chat.report');

    Route::resource('/message', App\Http\Controllers\Admin\MessageController::class);
    Route::get('/message/export/excel', [App\Http\Controllers\Admin\MessageController::class, 'exportExcel'])->name('message.export.excel');
    Route::get('/message/report', [App\Http\Controllers\Admin\MessageController::class, 'reportPage'])->name('message.report');
});
