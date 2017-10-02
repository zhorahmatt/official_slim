<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Slideshow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, GlobalClass;

class SlideshowController extends Controller
{
    public function index()
    {
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	$slideshow = DB::table('pages_slide')->get();
		$data['slideshow'] = $slideshow;

    	return view('admin.slideshow.index', $data);
    }

    public function create()
    {
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	return view('admin.slideshow.create');
    }

    public function store(Request $r)
    {
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	// Validation Store
		$this->validate($r,[
			'title'=>'required',
			'desc'=>'required',
			'image'=>'required'
		]);

		$count = DB::table('pages_slide')->count();
		if ($count > 0) {
			$sort = DB::table('pages_slide')->select('sort')->orderBy('sort', 'DESC')->first();
		} else {
			$sort = $count;
		}

		$slideshow = new Slideshow();

		// Upload Image
		$destination = resource_path('uploaded');
		$image_arr = GlobalClass::Upload($r->file('image'), $destination, 700);
		$image = implode(',',$image_arr);
		
		// Make copies to media
		if (!file_exists(resource_path('uploaded/media'))) {
			mkdir(resource_path('uploaded/media'), 0777, true);
		}
		copy(resource_path('uploaded').'/'.$image, resource_path('uploaded/media').'/'.$image);
		copy(resource_path('uploaded').'/thumb-'.$image, resource_path('uploaded/media').'/thumb-'.$image);

		$slideshow->title = $r->title;
		$slideshow->desc = $r->desc;
		$slideshow->link = $r->link;
		$slideshow->sort = $count > 0 ? $sort->sort + 1 : $sort + 1;
		$slideshow->image = $image;
		$slideshow->save();

		// Success Message  
		$r->session()->flash('success', 'Slideshow Successfully Added');

		return redirect(route('slideshow'));
    }

    public function edit($id)
    {
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		try
		{
		    $slideshow = Slideshow::findOrFail($id);
			$data['slideshow'] = $slideshow;

			return view('admin.slideshow.edit', $data);
		}
		catch(ModelNotFoundException $e)
		{
		    return redirect()->route('slideshow');
		}    	
    }

    public function update($id, Request $r)
    {
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	// Validation Update
		$this->validate($r,[
			'title'=>'required',
			'desc'=>'required'
		]);

		$count = DB::table('pages_slide')->count();
		if ($count > 0) {
			$sort = DB::table('pages_slide')->select('sort')->orderBy('sort', 'DESC')->first();
		}

		$slideshow = Slideshow::find($id);

		// Upload Image
		if ($r->hasFile('image')) 
		{
			// Remove Old Image
			$old = DB::table('pages')->where('id', $id)->first();
			@unlink(resource_path('uploaded').'/'.$old->image);
			@unlink(resource_path('uploaded').'/thumb-'.$old->image);

			// Upload Image
			$destination = resource_path('uploaded');
			$image_arr = GlobalClass::Upload($r->file('image'), $destination, 700);
			$image = implode(',',$image_arr);
			
			// Make copies to media
			if (!file_exists(resource_path('uploaded/media'))) {
				mkdir(resource_path('uploaded/media'), 0777, true);
			}
			copy(resource_path('uploaded').'/'.$image, resource_path('uploaded/media').'/'.$image);
			copy(resource_path('uploaded').'/thumb-'.$image, resource_path('uploaded/media').'/thumb-'.$image);
			
			// Save to DB
			$slideshow->image = $image;
		}

		$slideshow->title = $r->title;
		$slideshow->desc = $r->desc;
		$slideshow->link = $r->link;
		$slideshow->sort = $sort->sort + 1;
		$slideshow->save();

		// Success Message  
		$r->session()->flash('success', 'Slideshow Successfully Modified');

		return redirect(route('slideshow'));
    }

    public function delete(Request $r)
    {
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	// Delete Data
		Slideshow::where('id', $r->id)->delete();

		// Success Message
		$r->session()->flash('success', 'Slideshow Successfully Deleted');

		return redirect(route('slideshow'));
    }
}
