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

		//Messages
		Route::group(['prefix' => '/subscribers'], function(){
			Route::get('/', 'SubscribersController@index')->name('subscribers');
			Route::post('/store', 'SubscribersController@store')->name('subscribers_store');
			Route::post('/delete', 'SubscribersController@delete')->name('subscribers_delete');
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
		Route::group(['prefix' => '/galery'], function(){
			Route::get('/', 'PortfolioController@index')->name('portfolio');
			Route::get('/create', 'PortfolioController@create')->name('portfolio_create');
			Route::post('/store', 'PortfolioController@store')->name('portfolio_store');
			Route::get('/edit/{id?}', 'PortfolioController@edit')->name('portfolio_edit');
			Route::put('/update/{id?}', 'PortfolioController@update')->name('portfolio_update');
			Route::post('/delete', 'PortfolioController@delete')->name('portfolio_delete');
		});

		//Testimonials
		Route::group(['prefix' => '/testimonials'], function(){
			Route::get('/', 'TestimonialsController@index')->name('testimonials');
			Route::get('/create', 'TestimonialsController@create')->name('testimonials_create');
			Route::post('/store', 'TestimonialsController@store')->name('testimonials_store');
			Route::get('/edit/{id?}', 'TestimonialsController@edit')->name('testimonials_edit');
			Route::put('/update/{id?}', 'TestimonialsController@update')->name('testimonials_update');
			Route::post('/delete', 'TestimonialsController@delete')->name('testimonials_delete');
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

		//linked_url
		Route::group(['prefix' => '/tautan'], function(){
			Route::get('/','UrllinkedController@index')->name('tautan');
			Route::get('/create', 'UrllinkedController@create')->name('tautan_create');
			Route::post('/store', 'UrllinkedController@store')->name('tautan_store');
			Route::get('/{slug?}', 'UrllinkedController@detail')->name('tautan_detail');
			Route::post('/comment/store', 'UrllinkedController@comment_store')->name('comment_store');
			Route::get('/category/{category?}', 'UrllinkedController@view_category')->name('tautan_view_category');
			Route::get('/edit/{id?}', 'UrllinkedController@edit')->name('tautan_edit');
			Route::put('/update/{id?}', 'UrllinkedController@update')->name('tautan_update');
			Route::post('/delete', 'UrllinkedController@delete')->name('tautan_delete');

		});
	});
});


Route::group(['namespace' => 'Slim'], function() {
	//front
    Route::get('/', 'HomeController@index')->name('slim');
    Route::get('/galeri', 'HomeController@showAllGalleri');
    Route::get('/tentang', 'HomeController@about');
    Route::get('/kegiatan', 'HomeController@kegiatan');
	Route::get('/blog','HomeController@blog');
	Route::get('/blog/category/{category?}', 'HomeController@blogCategory')->name('front_blog_category');
	Route::get('/blog/{slug?}', 'HomeController@blogDetail')->name('front_blog_detail');
	Route::get('/page/{slug?}', 'HomeController@pages')->name('front_pages');
});


//dari blog.dev
Route::group(['prefix' => 'sepeda'], function(){
    Route::get('/', 'JamselinasController@index');
    Route::get('/register','JamselinasController@daftar_v1');
    Route::post('/daftar', 'JamselinasController@registrasi_v1');

    Route::group(['prefix' => 'administratif'], function(){
        Route::get('/{id}/provinsi', 'JamselinasController@allProvinces');
    });

    Route::get('/testingSendingEmail', function(){
        // Variable data ini yang berupa array ini akan bisa diakses di dalam "view".
        $data = ['prize' => 'Peke', 'total' => 3 ];
        
        // "emails.hello" adalah nama view.
        Mail::send('jamselinas.pages.front.email', $data, function ($mail)
        {
            // Email dikirimkan ke address "momo@deviluke.com" 
            // dengan nama penerima "Momo Velia Deviluke"
            $mail->to('info.rahmathidayat@gmail.com', 'Rahmat');

            // Copy carbon dikirimkan ke address "haruna@sairenji" 
            // dengan nama penerima "Haruna Sairenji"
            // $mail->cc('haruna@sairenji', 'Haruna Sairenji');

            $mail->subject('Hello World!');
        });
    });
});

Route::group(['prefix' => 'admin', 'namespace' => 'Dashboard'], function(){
    Route::get('/', 'AdminController@index');
});

Route::group(['prefix' => 'jamselinas8'], function() {
    //
    Route::get('/', 'JamselinasController@index');
    Route::get('/daftar' , 'JamselinasController@daftar');
});
