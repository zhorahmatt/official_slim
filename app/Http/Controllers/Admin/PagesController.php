<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Pages, App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, GlobalClass;

class PagesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		$pages = DB::table('pages')->where('deleted_at', null)->paginate(10);
		$data['pages'] = $pages;

		return view('admin.pages.index', $data);
	}

	public function create()
	{
		return view('admin.pages.create');
	}

	public function store(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Validation Store
		$this->validate($r,[
			'title'=>'required',
			'content'=>'required',
			'keyword'=>'required',
			'image'=>'required'
		]);

		// Make Slug
		$slug = str_slug($r->title, "-");

		// check to see if any other slugs exist that are the same & count them
		$count = DB::table('pages')->whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

		$pages = new Pages();

		// Upload Image
		$destination = public_path('uploaded');
		$image_arr = GlobalClass::Upload($r->file('image'), $destination, 700);
		$image = implode(',',$image_arr);
		
		// Make copies to media
		if (!file_exists(public_path('uploaded/media'))) {
			mkdir(public_path('uploaded/media'), 0777, true);
		}
		copy(public_path('uploaded').'/'.$image, public_path('uploaded/media').'/'.$image);
		copy(public_path('uploaded').'/thumb-'.$image, public_path('uploaded/media').'/thumb-'.$image);

		$pages->id_user = $r->id_user;
		$pages->slug = $count ? "{$slug}-{$count}" : $slug;
		$pages->title = $r->title;
		$pages->content = $r->content;
		$pages->keyword = $r->keyword;
		$pages->image = $image;
		$pages->save();

		// Success Message  
		$r->session()->flash('success', 'Pages Successfully Added');

		return redirect(route('pages'));
	}

	public function edit($id)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		try
		{
		    $pages = Pages::findOrFail($id);
			$data['pages'] = $pages;

			return view('admin.pages.edit', $data);
		}
		catch(ModelNotFoundException $e)
		{
		    return redirect()->route('pages');
		}
	}

	public function update($id, Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Validation Update
		$this->validate($r,[
			'title'=>'required',
			'content'=>'required',
			'keyword'=>'required'
		]);

		// Make Slug
		$slug = str_slug($r->title, "-");

		// check to see if any other slugs exist that are the same & count them
		$count = DB::table('pages')->where('id', '!=', $id)->where('slug', $slug)->count();
		if ($count > 0) {
			$count = DB::table('pages')->where('id', '!=', $id)->where('slug', 'LIKE', $slug.'%')->count();
		}

		$pages = Pages::find($id);

		// Upload Image
		if ($r->hasFile('image')) 
		{
			// Remove Old Image
			$old = DB::table('pages')->where('id', $id)->first();
			@unlink(public_path('uploaded').'/'.$old->image);
			@unlink(public_path('uploaded').'/thumb-'.$old->image);

			// Upload Image
			$destination = public_path('uploaded');
			$image_arr = GlobalClass::Upload($r->file('image'), $destination, 700);
			$image = implode(',',$image_arr);
			
			// Make copies to media
			if (!file_exists(public_path('uploaded/media'))) {
				mkdir(public_path('uploaded/media'), 0777, true);
			}
			copy(public_path('uploaded').'/'.$image, public_path('uploaded/media').'/'.$image);
			copy(public_path('uploaded').'/thumb-'.$image, public_path('uploaded/media').'/thumb-'.$image);
			
			// Save to DB
			$pages->image = $image;
		}

		$pages->id_user = $r->id_user;
		$pages->slug = $count > 0 ? $slug."-".$count : $slug;
		$pages->title = $r->title;
		$pages->content = $r->content;
		$pages->keyword = $r->keyword;
		$pages->save();

		// Success Message  
		$r->session()->flash('success', 'Pages Successfully Modified');

		return redirect(route('pages'));
	}

	public function detail($slug)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		try
		{
			// Relation Pages with Users
			$pages = Pages::join('users', 'pages.id_user', '=', 'users.id')
				->select('pages.*', 'users.fullname')
				->orderBy('created_at', 'title')
				->where('slug', $slug)
				->firstOrFail();
			$data['pages'] = $pages;

			//Recent Post
			$recent = DB::table('pages')->where('deleted_at', null)->get();
			$data['recent'] = $recent;

			return view('admin.pages.detail', $data);
		}
		catch(ModelNotFoundException $e)
		{
		    return redirect()->route('pages');
		}
			
	}

	public function delete(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Delete Data
		Pages::where('id', $r->id)->delete();

		// Success Message
		$r->session()->flash('success', 'Pages Successfully Deleted');

		return redirect(route('pages'));
	}
}
