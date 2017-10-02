<?php

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

Auth::routes();

Route::group(['namespace' => 'Front'], function () {
	Route::get('/503', 'HomeController@maintenance')->name('maintenance');
});

Route::group(['namespace' => 'Front'], function () {
	Route::get('/', 'HomeController@index')->name('front_home');
	Route::get('/about', 'HomeController@about')->name('front_about');
	Route::get('/portfolio', 'HomeController@portfolio')->name('front_portfolio');
	Route::get('/portfolio/{slug?}', 'HomeController@portfolioDetail')->name('front_portfolio_detail');
	Route::get('/blog', 'HomeController@blog')->name('front_blog');
	Route::get('/blog/{slug?}', 'HomeController@blogDetail')->name('front_blog_detail');
	Route::get('/page/{slug?}', 'HomeController@pages')->name('front_pages');
	Route::get('/pricing', 'HomeController@pricing')->name('front_pricing');
	Route::get('/faqs', 'HomeController@faqs')->name('front_faqs');
	Route::get('/overview', 'HomeController@overview')->name('front_overview');
	Route::get('/contact', 'HomeController@contact')->name('front_contact');
	Route::post('/contact-submit', 'HomeController@contactSubmit')->name('front_contact_submit');
});

Route::group(['namespace' => 'Admin'], function () {
	Route::group(['prefix' => 'admin'], function(){
		//Dashboard
		Route::group(['prefix' => '/'], function(){
			Route::get('/', 'DashboardController@index')->name('dashboard');
		});

		//Messages
		Route::group(['prefix' => '/mail'], function(){
			Route::get('/', 'MessagesController@index')->name('messages');
			Route::get('/compose', 'MessagesController@compose')->name('messages_create');
			Route::get('/detail/{id?}', 'MessagesController@detail')->name('messages_detail');
			Route::post('/delete', 'MessagesController@delete')->name('messages_delete');
			Route::get('/sent', 'MessagesController@sent')->name('messages_sent');
			Route::get('/trash', 'MessagesController@trash')->name('messages_trash');
		});

		//Menus
		Route::group(['prefix' => '/menus'], function(){
			Route::get('/', 'MenusController@index')->name('menus');
			Route::post('/store', 'MenusController@store')->name('menus_store');
			Route::post('/update', 'MenusController@update')->name('menus_update');
			Route::post('/delete', 'MenusController@delete')->name('menus_delete');
			Route::post('/drag', 'MenusController@drag')->name('menus_drag');
		});

		//Slideshow
		Route::group(['prefix' => '/slideshow'], function(){
			Route::get('/', 'SlideshowController@index')->name('slideshow');
			Route::get('/create', 'SlideshowController@create')->name('slideshow_create');
			Route::post('/store', 'SlideshowController@store')->name('slideshow_store');
			Route::get('/edit/{id?}', 'SlideshowController@edit')->name('slideshow_edit');
			Route::put('/update/{id?}', 'SlideshowController@update')->name('slideshow_update');
			Route::post('/delete', 'SlideshowController@delete')->name('slideshow_delete');
		});

		//About
		Route::group(['prefix' => '/about'], function(){
			Route::get('/', 'AboutController@index')->name('about');
			Route::post('/update', 'AboutController@update')->name('about_update');
			Route::get('/employees', 'AboutController@employees')->name('about_employees');
			Route::post('/employees/store', 'AboutController@employeesStore')->name('about_employees_store');
			Route::post('/employees/update', 'AboutController@employeesUpdate')->name('about_employees_update');
			Route::post('/employees/delete', 'AboutController@employeesdelete')->name('about_employees_delete');
		});

		//Portfolio
		Route::group(['prefix' => '/portfolio'], function(){
			Route::get('/', 'PortfolioController@index')->name('portfolio');
			Route::get('/create', 'PortfolioController@create')->name('portfolio_create');
			Route::post('/store', 'PortfolioController@store')->name('portfolio_store');
			Route::get('/edit/{id?}', 'PortfolioController@edit')->name('portfolio_edit');
			Route::put('/update/{id?}', 'PortfolioController@update')->name('portfolio_update');
			Route::post('/delete', 'PortfolioController@delete')->name('portfolio_delete');
		});

		//Posts
		Route::group(['prefix' => '/posts'], function(){
			Route::get('/', 'PostsController@index')->name('posts');
			Route::get('/create', 'PostsController@create')->name('posts_create');
			Route::post('/store', 'PostsController@store')->name('posts_store');
			Route::get('/{slug?}', 'PostsController@detail')->name('posts_detail');
			Route::post('/comment/store', 'PostsController@comment_store')->name('comment_store');
			Route::get('/category/{category?}', 'PostsController@view_category')->name('posts_view_category');
			Route::get('/edit/{id?}', 'PostsController@edit')->name('posts_edit');
			Route::put('/update/{id?}', 'PostsController@update')->name('posts_update');
			Route::post('/delete', 'PostsController@delete')->name('posts_delete');
		});

		//Pages
		Route::group(['prefix' => '/pages'], function(){
			Route::get('/', 'PagesController@index')->name('pages');
			Route::get('/create', 'PagesController@create')->name('pages_create');
			Route::post('/store', 'PagesController@store')->name('pages_store');
			Route::get('/{slug?}', 'PagesController@detail')->name('pages_detail');
			Route::get('/edit/{id?}', 'PagesController@edit')->name('pages_edit');
			Route::put('/update/{id?}', 'PagesController@update')->name('pages_update');
			Route::post('/delete', 'PagesController@delete')->name('pages_delete');
		});

		//Media
		Route::group(['prefix' => '/media'], function(){
			Route::get('/', 'MediaController@index')->name('media');
			Route::post('/upload', 'MediaController@upload')->name('media_upload');
			Route::post('/delete', 'MediaController@delete')->name('media_delete');
			Route::get('/froala', 'MediaController@froala')->name('media_froala');
		});

		//Team
		Route::group(['prefix' => '/team'], function(){
			Route::get('/', 'TeamController@index')->name('team');
			Route::get('/add', 'TeamController@create')->name('team_add');
			Route::post('/store', 'TeamController@store')->name('team_add_store');
			Route::get('/edit/{id?}', 'TeamController@edit')->name('team_edit');
			Route::put('/update/{id?}', 'TeamController@update')->name('team_edit_update');
			Route::post('/delete', 'TeamController@delete')->name('team_delete');
			Route::get('/profile', 'TeamController@profile')->name('profile');
		});

		//Setting
		Route::group(['prefix' => '/setting'], function(){
			Route::get('/', 'SettingController@index')->name('setting');
			Route::post('/update', 'SettingController@update')->name('setting_update');
		});

		//Sharing
		Route::group(['prefix' => '/sharing'], function(){
			Route::get('/', 'SharingController@index')->name('sharing');
		});

		//Help
		Route::get('/help', function(){
			return view('admin.help.index');
		})->name('help');
	});
});