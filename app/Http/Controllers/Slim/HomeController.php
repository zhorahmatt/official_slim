<?php

namespace App\Http\Controllers\Slim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Posts;
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
        
        $testimonials = DB::table('testimonials')->get();
        $data['testimonials'] = $testimonials;

		// Visitors Count
        $data['visitors_count'] = DB::table('visitors')->count();
        
        //about
        $data['about'] = DB::table('pages_about')->first();

        return view('slim.pages.front.home', $data);
    }

    public function showAllGalleri()
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
		$data['portofolios'] = $portfolio;
        return view('slim.pages.front.galleri',$data);
    }

    public function kegiatan()
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
        
        $testimonials = DB::table('testimonials')->get();
        $data['testimonials'] = $testimonials;

		// Visitors Count
        $data['visitors_count'] = DB::table('visitors')->count();
        
        //about
        $data['about'] = DB::table('pages_about')->first();
        return view('slim.pages.front.event',$data);
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

        return view('slim.pages.front.blog', $data);
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

        // Slideshow
		$slideshow = DB::table('pages_slide')->get();
        $data['slideshow'] = $slideshow;
        
		// Get Data Team
		$data['teams'] = DB::table('pages_about_team')->get();
		$data['team_count'] = DB::table('pages_about_team')->count();

		// Recent Posts
		$data['recent_posts'] = Posts::where('deleted_at', null)->take(5)->get();
        return view('slim.pages.front.about', $data);
    }
}
