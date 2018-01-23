<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Posts;
use App\Http\Controllers\Controller;
use DB, GlobalClass;

class HomeController extends Controller
{	
	public function index()
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->select(DB::raw('*, SUBSTRING(menu_title, 1, 1) as menu_right'))->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();
		
		if (!$data['menus']) {
			$data['menus'] = (object) '';
			$data['menus'] -> menu_title = 'Home';
		}
		// var_dump($data['menus']);exit();

		// Slideshow
		$slideshow = DB::table('pages_slide')->get();
		$data['slideshow'] = $slideshow;

		// Posts
		$post = DB::table('posts')
					->where('deleted_at', null)
					->where('published', '!=', null)
					->orderBy('created_at', 'DESC')
					->take(3)
					->get();
		$data['posts'] = $post;

		// Sambutan
		$sambutan = DB::table('pages')
					->where('title', '@Sambutan')
					->first();
		$data['sambutan'] = $sambutan;

		// Visitors Count
		$data['visitors_count'] = DB::table('visitors')->count();

		return view('front.kejari.home.index', $data);
	}

	public function about()
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->select(DB::raw('*, SUBSTRING(menu_title, 1, 1) as menu_right'))->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/about')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		// Get Data About
		$data['about'] = DB::table('pages_about')->first();

		// Get Data Team
		$data['teams'] = DB::table('pages_about_team')->get();
		$data['team_count'] = DB::table('pages_about_team')->count();

		// Recent Posts
		$data['recent_posts'] = Posts::where('deleted_at', null)->take(5)->get();

		return view('front.kejari.about.index', $data);
	}

	public function galery()
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->select(DB::raw('*, SUBSTRING(menu_title, 1, 1) as menu_right'))->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/portfolio')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		// Relation Posts with Users
		$portfolio = DB::table('pages_work')->select('title', 'image', 'tag', DB::raw('count(tag) as count'))->groupBy('tag')->paginate(20);
		$data['portfolios'] = $portfolio;

		return view('front.kejari.portfolio.index', $data);
	}

	public function galeryDetail($tag)
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->select(DB::raw('*, SUBSTRING(menu_title, 1, 1) as menu_right'))->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/portfolio')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		// Relation Posts with Users
		$portfolio = DB::table('pages_work')->where('tag', str_replace('_', ' ', $tag))->orderBy('created_at', 'DESC')->get();
		$data['portfolios'] = $portfolio;

		return view('front.kejari.portfolio.detail', $data);
	}

	public function blog()
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->select(DB::raw('*, SUBSTRING(menu_title, 1, 1) as menu_right'))->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/blog')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		// Relation Posts with Users
		$posts = DB::table('posts')
			->join('users', 'posts.id_user', '=', 'users.id')
			->select('posts.*', 'users.fullname', 'users.image as photo')
			->where('posts.deleted_at', null)
			->where('posts.published', '!=', null)
			->orderBy('created_at', 'DESC');
		$data['posts'] = $posts->paginate(10);

		return view('front.kejari.blog.index', $data);
	}

	public function blogCategory($category)
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->select(DB::raw('*, SUBSTRING(menu_title, 1, 1) as menu_right'))->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/blog')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		// Relation Posts with Users
		$category = ucwords(str_replace('-', ' ', $category));
		$posts = DB::table('posts')
			->join('users', 'posts.id_user', '=', 'users.id')
			->select('posts.*', 'users.fullname', 'users.image as photo')
			->where('posts.deleted_at', null)
			->where('posts.published', '!=', null)
			->where('posts.category', $category)
			->orderBy('created_at', 'DESC');
		$data['posts'] = $posts->paginate(10);

		$data['category'] = $category;

		return view('front.kejari.blog.index', $data);
	}

	public function blogDetail($slug)
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->select(DB::raw('*, SUBSTRING(menu_title, 1, 1) as menu_right'))->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/blog')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();
		
		// Relation Posts with Users
		$posts = DB::table('posts')
			->join('users', 'posts.id_user', '=', 'users.id')
			->select('posts.*', 'users.fullname', 'users.image as photo')
			->where('posts.deleted_at', null)
			->where('posts.published', '!=', null)
			->orderBy('created_at', 'DESC');
		$data['post'] = $posts->where('slug', $slug)->first();

		// Recent Posts
		$data['recent_posts'] = Posts::where('slug', '!=', $slug)->where('deleted_at', null)->take(5)->get();

		return view('front.kejari.blog.detail', $data);
	}

	public function pages($slug)
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->select(DB::raw('*, SUBSTRING(menu_title, 1, 1) as menu_right'))->orderBy('sort')->get();
		
		// Get Data Page
		$pages = DB::table('pages')
			->where('deleted_at', null)
			->where('slug', $slug)
			->first();
		$data['page'] = $pages;

		$data['menus'] = DB::table('menus')->where('url', '/page/'.$pages->slug)->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		// Recent Posts
		$data['recent_posts'] = Posts::where('deleted_at', null)->take(5)->get();

		return view('front.kejari.pages.index', $data);
	}

	public function contact()
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->select(DB::raw('*, SUBSTRING(menu_title, 1, 1) as menu_right'))->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/contact')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();
		
		return view('front.kejari.contact.index', $data);
	}

	public function contactSubmit(Request $r)
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}
		
		// Validation Store
		$this->validate($r,[
			'fullname'=>'required',
			'email'=>'required|email',
			'phone'=>'required|numeric',
			'message'=>'required'
		]);

		DB::insert('insert into messages (fullname, email, phone, message) values (?, ?, ?, ?)', [
				$r->fullname,
				$r->email,
				$r->phone,
				$r->message
			]);

		// Success Message  
		$r->session()->flash('success', 'Pesan Anda berhasil terkirim');

		return redirect(route('front_contact'));
	}

	public function maintenance()
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return view('errors.503');
		} else {
			return redirect(route('front_home'));
		}
	}
}