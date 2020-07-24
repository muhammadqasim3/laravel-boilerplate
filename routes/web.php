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

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}


//===================== Admin Routes =====================//

Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin','prefix'=>'admin'], function () {


    Route::get('/','Admin\AdminController@dashboard');

    Route::get('/dashboard','Admin\AdminController@dashboard');

    Route::get('account/settings','Admin\UsersController@getSettings');
    Route::post('account/settings','Admin\UsersController@saveSettings');

    Route::get('project', function () {
        return view('dashboard.index-project');
    });

    Route::get('analytics', function () {
        return view('admin.dashboard.index-analytics');
    });


	Route::get('logo/edit','Admin\AdminController@logoEdit');
	Route::post('logo/upload','Admin\AdminController@logoUpload')->name('logo_upload');

	Route::get('favicon/edit','Admin\AdminController@faviconEdit');
	Route::post('favicon/upload','Admin\AdminController@faviconUpload')->name('favicon_upload');

    Route::get('config/setting', function () {
        return view('admin.dashboard.index-config');
    });

    Route::get('contact/inquiries','Admin\AdminController@contactSubmissions');
    Route::get('contact/inquiries/{id}','Admin\AdminController@inquiryshow');
    Route::get('newsletter/inquiries','Admin\AdminController@newsletterInquiries');
	Route::get('request/inquiries','Admin\AdminController@requestSubmissions');
    Route::get('request/inquiries/{id}','Admin\AdminController@requestshow');

	Route::any('contact/submissions/delete/{id}','Admin\AdminController@contactSubmissionsDelete');
	Route::any('newsletter/inquiries/delete/{id}','Admin\AdminController@newsletterInquiriesDelete');
	Route::any('request/submissions/delete/{id}','Admin\AdminController@requestDelete');


    /* Config Setting Form Submit Route */
	Route::post('config/setting','Admin\AdminController@configSettingUpdate')->name('config_settings_update');




//==============================================================//

//==================== Error pages Routes ====================//
    Route::get('403',function (){
        return view('pages.403');
    });

    Route::get('404',function (){
        return view('pages.404');
    });

    Route::get('405',function (){
        return view('pages.405');
    });

    Route::get('500',function (){
        return view('pages.500');
    });
//============================================================//

    #Permission management
    Route::get('permission-management','PermissionController@getIndex');
    Route::get('permission/create','PermissionController@create');
    Route::post('permission/create','PermissionController@save');
    Route::get('permission/delete/{id}','PermissionController@delete');
    Route::get('permission/edit/{id}','PermissionController@edit');
    Route::post('permission/edit/{id}','PermissionController@update');

    #Role management
    Route::get('role-management','RoleController@getIndex');
    Route::get('role/create','RoleController@create');
    Route::post('role/create','RoleController@save');
    Route::get('role/delete/{id}','RoleController@delete');
    Route::get('role/edit/{id}','RoleController@edit');
    Route::post('role/edit/{id}','RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log','LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    Route::get('users','Admin\\UsersController@Index');
    Route::get('user/create','Admin\\UsersController@create');
    Route::post('user/create','Admin\\UsersController@save');
    Route::get('user/edit/{id}','Admin\\UsersController@edit');
    Route::post('user/edit/{id}','Admin\\UsersController@update');
    Route::get('user/delete/{id}','Admin\\UsersController@destroy');
    Route::get('user/deleted/','Admin\\UsersController@getDeletedUsers');
    Route::get('user/restore/{id}','Admin\\UsersController@restoreUser');


    Route::resource('product', 'Admin\\ProductController');
    Route::get('product/{id}/delete', ['as' => 'product.delete', 'uses' => 'Admin\\ProductController@destroy']);
    Route::get('order/list', ['as' => 'order.list', 'uses' => 'Admin\\ProductController@orderList']);
	Route::get('order/detail/{id}', ['as' => 'order.list.detail', 'uses' => 'Admin\\ProductController@orderListDetail']);

	 //Order Status Change Routes//
	Route::get('status/completed/{id}','Admin\\ProductController@updatestatuscompleted')->name('status.completed');
	Route::get('status/pending/{id}','Admin\\ProductController@updatestatusPending')->name('status.pending');


});

//==============================================================//

//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');


Route::get('auth/{provider}/','Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback','Auth\SocialLoginController@handleProviderCallback');
Route::get('logout','Auth\LoginController@logout');
Auth::routes();


//===================== Account Area Routes =====================//
Route::get('signin','GuestController@signin')->name('signin');
Route::get('signup','GuestController@signup')->name('signup');
Route::get('account-detail','LoggedInController@accountDetail')->name('accountDetail');
Route::get('account','LoggedInController@account')->name('account');
Route::post('update/account','LoggedInController@updateAccount')->name('update.account');
Route::get('signout', function() {
		Auth::logout();

		Session::flash('flash_message', 'You have logged out  Successfully');
		Session::flash('alert-class', 'alert-success');

		return redirect('signin');
});

Route::get('logout','Auth\LoginController@logout');
Auth::routes();

Route::get('account/friends','LoggedInController@friends')->name('friends');
Route::get('account/upload','LoggedInController@upload')->name('upload');
Route::get('account/password','LoggedInController@password')->name('password');

Route::get('/success','OrderController@success')->name('success');

Route::post('update/profile','LoggedInController@update_profile')->name('update_profile');
Route::post('update/uploadPicture','LoggedInController@uploadPicture')->name('uploadPicture');


//===================== Front Routes =====================//


Route::get('/','HomeController@index')->name('home');


Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

/*
Route::get('/test', function() {
	App::setlocale('arab');
	dd(App::getlocale());
	if(App::setlocale('arab')) {

	}
});
*/
/* Form Validation */
Route::post('contact-from-submit','HomeController@conatctFromInquiry')->name('conatctFromInquiry');
Route::post('schedule-submit','HomeController@scheduleSubmit')->name('scheduleSubmit');
Route::post('newsletter-submit','HomeController@newsletterSubmit')->name('newsletterSubmit');
Route::post('request-submit','HomeController@requestSubmit')->name('requestSubmit');

/* Editor Route */
Route::post('front-editor-submit','HomeController@frontEditorSubmit')->name('frontEditorSubmit');

/* */
Route::group(['middleware' => 'auth'],function () {

});



Route::get('social-anxiety','HomeController@socialAnxiety')->name('social-anxiety');
Route::get('services-detail/{id}','HomeController@servicesDetail')->name('servicesDetail');
Route::get('contact','HomeController@contact')->name('contact');
Route::get('about','HomeController@about')->name('about');
Route::get('faqs','HomeController@faqs')->name('faqs');
Route::get('act-therapy','HomeController@actTherapy')->name('act-therapy');
Route::get('anger-management','HomeController@angerManagement')->name('anger-management');
Route::get('articles-detail','HomeController@articlesDetail')->name('articles-detail');
Route::get('articles','HomeController@articles')->name('articles');
Route::get('attachment-focused','HomeController@attachmentFocused')->name('attachment-focused');
Route::get('audio-resources','HomeController@audioResources')->name('audioResources');
Route::get('depression','HomeController@depression')->name('depression');
Route::get('cognitive-behavioural','HomeController@cognitiveBehavioural')->name('cognitive-behavioural');
Route::get('emdr-therapy','HomeController@emdrTherapy')->name('emdr-therapy');
Route::get('gallery','HomeController@gallery')->name('gallery');
Route::get('generalised','HomeController@generalised')->name('generalised');
Route::get('materials','HomeController@materials')->name('materials');
Route::get('medico-legal','HomeController@medicoLegal')->name('medico-legal');
Route::get('online-emdr-therapy','HomeController@onlineEmdrTherapy')->name('online-emdr-therapy');
Route::get('panic-disorder','HomeController@panicDisorder')->name('panic-disorder');
Route::get('post-traumatic','HomeController@postTraumatic')->name('post-traumatic');
Route::get('presonal-therap','HomeController@presonalTherap')->name('presonal-therap');
Route::get('resource','HomeController@resource')->name('resource');
Route::get('obsessive-compulsive','HomeController@obsessiveCompulsive')->name('obsessive-compulsive');
Route::get('i-can-help-with','HomeController@iCanHelpWith')->name('iCanHelpWith');
Route::get('resorce','HomeController@resorce')->name('resorce');

Route::post('/language-form', 'ProductController@language')->name('language');

//==============================================================//

Route::get('user-ip', 'HomeController@getusersysteminfo');

//===================== New Crud-Generators Routes Will Auto Display Below ========================//



Route::resource('admin/blog', 'Admin\\BlogController');
Route::resource('admin/faq', 'Admin\\FaqController');
Route::resource('admin/category', 'Admin\\CategoryController');

Route::resource('admin/banner', 'Admin\\BannerController');
Route::get('admin/banner/{id}/delete', ['as' => 'banner.delete', 'uses' => 'Admin\\BannerController@destroy']);
Route::resource('admin/category', 'Admin\\CategoryController');
Route::resource('admin/discovery', 'Admin\\DiscoveryController');
Route::resource('admin/team', 'Admin\\TeamController');
Route::resource('admin/builder', 'Admin\\BuilderController');
Route::resource('admin/testimonial', 'Admin\\TestimonialController');
Route::resource('admin/page', 'Admin\\PageController');
Route::resource('admin/language', 'Admin\\LanguageController');
Route::resource('admin/content', 'Admin\\ContentController');
Route::resource('admin/member', 'Admin\\MemberController');
Route::resource('admin/yup', 'Admin\\YupController');
Route::resource('admin/what', 'Admin\\WhatController');
Route::resource('admin/service', 'Admin\\ServiceController');
Route::resource('admin/i_can_help_with', 'Admin\\I_can_help_withController');
Route::resource('admin/service', 'Admin\\ServiceController');
