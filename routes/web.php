<?php

use App\Events\StrickOneEvent;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\Settings\ApplicationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Settings\MailerController;
use App\Http\Controllers\Admin\Settings\SeoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CommentController as ACommentController;
use App\Http\Controllers\Admin\FAQController as AFAQController;
use App\Http\Controllers\Admin\CMS\AppletController;
use App\Http\Controllers\Admin\CMS\PagesController;
use App\Http\Controllers\Admin\CMS\WhoweareController;
use App\Http\Controllers\Admin\CMS\MessageController as CmsMessage;
use App\Http\Controllers\Ideas\ArenaController;
use App\Http\Controllers\Ideas\CommentController;
use App\Http\Controllers\Ideas\IdeaController;
use App\Http\Controllers\Ideas\StrikeOneController;
use App\Http\Controllers\Ideas\MembershipController;
use App\Http\Controllers\Main\BackgroundController;
use App\Http\Controllers\Main\ContactController;
use App\Http\Controllers\Main\FAQController;
use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\ServiceController;
use App\Http\Controllers\Main\WhoController;
use App\Http\Controllers\Main\MessageController;
use App\Http\Controllers\Command\CommandController;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Mail\PasswordMail;
use App\Http\Controllers\Auth\Social\SocialAuthController;

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


Route::get('/sitemap.xml',[HomeController::class, 'sitemap'])->name('avrt.sitemap');
Route::get('/', [HomeController::class, 'main'])->name('avrt.home')->middleware('global');

Route::group(['prefix' => 'avrt','middleware'=>'global'], function () {
    Route::get('faq', [FAQController::class, 'main'])->name('avrt.faq');
    Route::get('back', [BackgroundController::class, 'main'])->name('avrt.back');
    Route::get('service', [ServiceController::class,'main'])->name('avrt.service');
    Route::get('who-are-we', [WhoController::class, 'main'])->name('avrt.who');
    Route::get('contact', [ContactController::class, 'main'])->name('avrt.contact');
    Route::post('contact', [ContactController::class, 'storeContact'])->name('avrt.contact.store');
    Route::get('message',[MessageController::class,'message'])->name('avrt.message');
    Route::get('merry/christmas',[MessageController::class,'merryChristmas'])->name('avrt.christmas');
    Route::get('blog',[BlogController::class,'blogView'])->name('avrt.blog');
    Route::get('post/{slug}',[IdeaController::class, 'specific'])->name('avrt.idea.slug');
    Route::get('blog/create',[IdeaController::class, 'createBlog'])->name('avrt.blog.create');
    Route::post('blog/store',[IdeaController::class, 'storeBlog'])->name('avrt.blog.store');
    Route::get('blog/edit/{slug?}',[IdeaController::class, 'editBlog'])->name('avrt.blog.edit');
    Route::post('blog/update',[IdeaController::class, 'updateBlog'])->name('avrt.blog.update');
});

Route::group(['prefix' => 'auth','middleware'=>'global'], function () {
    Route::post('signin', [LoginController::class, 'signin']);
    Route::post('signup', [RegisterController::class, 'signup']);
    Route::post('logout', [LogoutController::class, 'logout'])->name('auth.logout');
    Route::get('send/password/link',[LoginController::class, 'passwordLink'])->name('auth.password.link');
    Route::get('/reset/password/{email?}',[LoginController::class, 'resetPassword'])->name('auth.reset.password')->middleware('signed');
    Route::post('change/password',[LoginController::class,'changePassword'])->name('auth.change.password');
    Route::get('google/redirect',[SocialAuthController::class,'googleRedirect'])->name('auth.google.redirect');
    Route::get('google/callback',[SocialAuthController::class,'googleCallback'])->name('auth.google.callback');
    Route::get('facebook/redirect',[SocialAuthController::class,'facebookRedirect'])->name('auth.facebook.redirect');
    Route::get('facebook/callback',[SocialAuthController::class,'facebookCallback'])->name('auth.facebook.callback');
});

Route::group(['prefix' => 'batter'], function () {
    Route::post('comment', [StrikeOneController::class, 'comment']);
    Route::post('arithmetic',[StrikeOneController::class, 'commentArithmetic'])->name('comment.arithmetic');
});

Route::group(['prefix' => 'arena','middleware'=>['subscription','global']], function () {
    Route::get('checkout/{slug}', [ArenaController::class, 'checkout'])->name('arean.checkout');
    Route::get('post/{slug}',[ArenaController::class,'arena'])->name('arena.post');
    Route::post('comment', [ArenaController::class, 'comment']);
    Route::post('reply', [ArenaController::class, 'reply']);
    Route::get('delete', [ArenaController::class, 'delete'])->name('arena.delete');
});

Route::group(['prefix'=>'/membership','middleware'=>'global'],function(){
    Route::post('subscribe',[MembershipController::class,'subscribe']);
    Route::get('paypal/success/{slug?}',[MembershipController::class,'paypalSuccess'])->name('payment.paypal.success');
    Route::get('paypal/cancel/{slug?}',[MembershipController::class,'paypalCancel'])->name('payment.paypal.cancel');
});

Route::group(['prefix'=>'/admin','middleware' => 'verifyadmin'], function () {
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('posts', PostController::class);
    Route::resource('application',ApplicationController::class);
    Route::resource('mailer',MailerController::class);
    Route::resource('seo',SeoController::class);
    Route::resource('comments',ACommentController::class);
    Route::resource('faq',AFAQController::class);
    Route::resource('applets',AppletController::class);
    Route::post('deleteAll',[ACommentController::class,'deleteAll'])->name('comments.deleteAll');
    Route::post('/cms/who_are_we',[WhoweareController::class,'createCms'])->name('cms.who_are_we');
     Route::post('/cms/message',[CmsMessage::class,'createCms'])->name('cms.message');
    Route::controller(PagesController::class)->group(function(){
    Route::get('/pages/home','home')->name('pages.home');
    Route::get('/pages/faq','faq')->name('pages.faq');
    Route::get('/pages/background','background')->name('pages.back');
    Route::get('/pages/message','message')->name('pages.message');
    Route::get('/page/who','whoarewe')->name('pages.whoweare');
    Route::get('/pages/contact','contact')->name('pages.contact');
    });
});

Route::get('/send/mail', function () {
               $user_exist=User::where('email','zonewebsites2@gmail.com')->first();
               $mail=Mail::to('avrt@avrt.com')->send(new PasswordMail($user_exist));
   // Mail::to('blackzonemail999@gmail.com')->send(new WelcomeEmail());
});

Route::get('/artisan/command',[CommandController::class,'command']);
Route::view('/checkout', 'ideas.checkout');
Route::view('/password/view','mailer.passwordreset');
Route::get('/password',function(){
    $password=Hash::make('a1v22r18t20-admin@password');
});

Route::get('/get/logs',function(){
    $file=storage_path('logs/laravel.log');
    if($file){
        dd(file_get_contents($file));
    }
});

Route::get('/delete/logs',function(){
    $file=storage_path('logs/laravel.log');
    if($file){
        unlink($file);
    }
});

Route::get('/app/url',function(){
   if(str_contains(url()->current(),'/avrt/public')){
       $url=substr(url()->current(),strlen('/avrt/public'));
       dd($url);
   }
});

Route::get('/mail-test',function(){
    $html = 'Hello';
   Mail::html($html, function ($message) {
  $message
    ->to('avrtprivatemail@avrt.com')
    ->subject('Devloper Test.');
});

Route::get('/test/command',function(){

    dd(php_info());

});

});

