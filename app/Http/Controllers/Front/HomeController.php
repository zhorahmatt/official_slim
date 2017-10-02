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
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
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

		// Relation Posts with Users
		$portfolio = DB::table('pages_work')->orderBy('created_at', 'DESC')->limit(3)->get();
		$data['portfolios'] = $portfolio;

		// Visitors Count
        $data['visitors_count'] = DB::table('visitors')->count();

		return view('front.vendis.home.index', $data);
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
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/about')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		// Get Data About
		$data['about'] = DB::table('pages_about')->first();

		// Get Data Team
		$data['teams'] = DB::table('pages_about_team')->get();
		$data['team_count'] = DB::table('pages_about_team')->count();

		return view('front.vendis.about.index', $data);
	}

	public function portfolio()
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/portfolio')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		// Relation Posts with Users
		$portfolio = DB::table('pages_work')->orderBy('created_at', 'DESC')->paginate(10);
		$data['portfolios'] = $portfolio;

		return view('front.vendis.portfolio.index', $data);
	}

	public function portfolioDetail($id)
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/portfolio')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		// Relation Posts with Users
		$portfolio = DB::table('pages_work')->where('id', $id)->orderBy('created_at', 'DESC')->first();
		$data['portfolio'] = $portfolio;

		return view('front.vendis.portfolio.detail', $data);
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
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/blog')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		// Relation Posts with Users
		$posts = DB::table('posts')
			->join('users', 'posts.id_user', '=', 'users.id')
			->select('posts.*', 'users.fullname')
			->where('posts.deleted_at', null)
			->where('posts.published', '!=', null)
			->orderBy('created_at', 'DESC');
		$data['posts'] = $posts->paginate(10);

		// Recent Posts
		$data['recent_posts'] = Posts::where('deleted_at', null)->take(5)->get();

		// Category
		$category = DB::table('posts')->select('category', DB::raw('COUNT(category) as count'))->groupBy('category')->where('deleted_at', null)->orderBy('category')->get();
		$data['categories'] = $category;

		return view('front.vendis.blog.index', $data);
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
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/blog')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();
		
		// Relation Posts with Users
		$posts = DB::table('posts')
			->join('users', 'posts.id_user', '=', 'users.id')
			->select('posts.*', 'users.fullname')
			->where('posts.deleted_at', null)
			->where('posts.published', '!=', null)
			->orderBy('created_at', 'DESC');
		$data['post'] = $posts->where('slug', $slug)->first();

		// Recent Posts
		$data['recent_posts'] = Posts::where('slug', '!=', $slug)->where('deleted_at', null)->take(5)->get();

		// Category
		$category = DB::table('posts')->select('category', DB::raw('COUNT(category) as count'))->groupBy('category')->where('deleted_at', null)->orderBy('category')->get();
		$data['categories'] = $category;

		return view('front.vendis.blog.detail', $data);
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
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
		
		// Get Data Page
		$pages = DB::table('pages')
			->where('deleted_at', null)
			->where('slug', $slug)
			->first();
		$data['page'] = $pages;

		$data['menus'] = DB::table('menus')->where('url', '/page/'.$pages->slug)->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		return view('front.vendis.pages.index', $data);
	}

	public function pricing()
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/blog')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		return view('front.vendis.pricing.index', $data);
	}

	public function faqs()
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/blog')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		return view('front.vendis.faqs.index', $data);
	}

	public function overview()
	{
		// Maintenance mode
		$setting = DB::table('setting')->first();
		if ($setting->maintenance == '1') {
			return redirect(route('maintenance'));
		}

		// Default Var
		$data['setting'] = $setting;
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/blog')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();

		return view('front.vendis.overview.index', $data);
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
		$data['nav'] = DB::table('menus')->orderBy('sort')->get();
		$data['menus'] = DB::table('menus')->where('url', '/contact')->first();
		$data['subs'] = DB::table('menus')->select('parent')->where('parent', '!=', '0')->get();
		
		return view('front.vendis.contact.index', $data);
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
		$r->session()->flash('success', 'Your message successfully send to us. We will reply your message less than 24 hour.');

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