<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Urllinked as Linked;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DB, Session, GlobalClass, DateTime;

class UrllinkedController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
        GlobalClass::Roleback(['Customer Service']);

        //Get Linked URL
        $data['linked'] = Linked::all();
		return view('admin.linked.index', $data);
	}

	public function create()
	{
		GlobalClass::Roleback(['Customer Service']);
		
		// Category
		$category = DB::table('posts')->select('category', DB::raw('COUNT(category) as count'))->groupBy('category')->where('posts.status', 'publish')->where('deleted_at', null)->orderBy('category')->get();
		$data['categories'] = $category;

		return view('admin.linked.create', $data);
	}

	public function store(Request $r)
	{
		GlobalClass::Roleback(['Customer Service']);
		
		// Validation Store
		$this->validate($r,[
			'title'=>'required',
			'description'=>'required',
			'url_linked'=>'required',
        ]);
        
        $url = new Linked;

		$url->title = $r->title;
		$url->description = $r->description;
		$url->url_link = $r->url_linked;
		$url->save();

		// Success Message  
		$r->session()->flash('success', 'URL Linked Successfully Added');

		return redirect(route('tautan'));
	}

	public function detail($slug)
	{
		GlobalClass::Roleback(['Customer Service']);
		try
		{
		    // Get Posts
			$data['post'] = GlobalClass::Posts()->where('slug', $slug)->firstOrFail();

			// Get Recent Posts
			$data['recent_posts'] = GlobalClass::Posts()->limit(5)->get();

			// Get Draft
			$data['drafts'] = GlobalClass::Posts('draft')->get();

			// Category
			$category = DB::table('posts')->select('category', DB::raw('COUNT(category) as count'))->groupBy('category')->where('posts.status', 'publish')->where('deleted_at', null)->orderBy('category')->get();
			$data['categories'] = $category;

			// Comment
			$comment = DB::table('comments')
				->join('users', 'comments.id_user', '=', 'users.id')
				->select('comments.*', 'users.fullname', 'users.image')
				->where('comments.id_parent', 0)
				->get();
			$data['comment'] = $comment;

			// Parent
			$parents = DB::table('comments')
				->join('users', 'comments.id_user', '=', 'users.id')
				->select('comments.*', 'users.fullname', 'users.image')
				->get();
			$data['parents'] = $parents;

			return view('admin.linked.detail', $data);
		}
		catch(ModelNotFoundException $e)
		{
		    return redirect()->route('posts');
		}	
	}

	public function comment_store(Request $r)
	{
		GlobalClass::Roleback(['Customer Service']);
		
		$comment = new Comments();
		$comment->id_user = $r->id_user;
		$comment->id_parent = $r->id_parent;
		$comment->id_posts = $r->id_posts;
		$comment->comment = $r->comment;
		$comment->save();

		return redirect()->back();
	}

	public function view_category($category)
	{
		GlobalClass::Roleback(['Customer Service']);
		
		// Get Posts
		$data['posts'] = GlobalClass::Posts()->where('category', $category)->paginate(10);

		// Get Recent Posts
		$data['recent_posts'] = GlobalClass::Posts()->limit(5)->get();
		
		// Get Draft
		$data['drafts'] = GlobalClass::Posts('draft')->get();

		// Category
		$category = DB::table('posts')->select('category', DB::raw('COUNT(category) as count'))->groupBy('category')->where('posts.status', 'publish')->where('deleted_at', null)->orderBy('category')->get();
		$data['categories'] = $category;

		return view('admin.linked.index', $data);
	}

	public function edit($id)
	{
		GlobalClass::Roleback(['Customer Service']);
		try
		{
		    $url = Linked::findOrFail($id);
			$data['linked'] = $url;

			return view('admin.linked.edit', $data);
		}
		catch(ModelNotFoundException $e)
		{
		    return redirect()->route('tautan');
		}	
			
	}

	public function update($id, Request $r)
	{
		GlobalClass::Roleback(['Customer Service']);
		
		// Validation Update
		$this->validate($r,[
			'title'=>'required',
			'description'=>'required',
			'url_linked'=>'required'
		]);

		$url =  Linked::find($id);

        $url->title = $r->title;
        $url->description = $r->description;
        $url->url_link = $r->url_linked;
		$url->save();

		// Success Message  
		$r->session()->flash('success', 'URL Linked Successfully Modified');

		return redirect(route('tautan'));
	}

	public function delete(Request $r)
	{
		GlobalClass::Roleback(['Customer Service']);
		
		// Delete Data
		Linked::where('id', $r->id)->delete();

		// Success Message
		$r->session()->flash('success', 'URL Linked Successfully Deleted');

		return redirect(route('tautan'));
	}
}

