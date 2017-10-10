<?php

namespace App\Http\Controllers\Admin;
use App\Testimonials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GlobalClass, DB;

class TestimonialsController extends Controller
{
    public function index()
    {
    	GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	$testimonials = Testimonials::all();
		$data['testimonials'] = $testimonials;

    	return view('admin.testimonials.index', $data);
    }

    public function create()
    {
    	GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	return view('admin.testimonials.create');
    }

    public function store(Request $r)
    {
    	GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	// Validation Store
		$this->validate($r,[
			'name'=>'required',
			'position'=>'required',
			'message'=>'required',
			'image'=>'required'
		]);

		$testimonials = new Testimonials();

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

		$testimonials->name = $r->name;
		$testimonials->position = $r->position;
		$testimonials->message = $r->message;
		$testimonials->image = $image;
		$testimonials->save();

		// Success Message  
		$r->session()->flash('success', 'Testimonials Successfully Added');

		return redirect(route('testimonials'));
    }

    public function edit($id)
    {
    	GlobalClass::Roleback(['Customer Service', 'Writer']);
		try
		{
		    $testimonials = Testimonials::findOrFail($id);
			$data['testimonials'] = $testimonials;

			return view('admin.testimonials.edit', $data);
		}
		catch(ModelNotFoundException $e)
		{
		    return redirect()->route('testimonials');
		}  
    }

    public function update($id, Request $r)
    {
    	GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	// Validation Update
		$this->validate($r,[
			'name'=>'required',
			'message'=>'required',
			'position'=>'required'
		]);

		$testimonials = Testimonials::find($id);

		// Upload Image
		if ($r->hasFile('image')) 
		{
			// Remove Old Image
			$old = DB::table('testimonials')->where('id', $id)->first();
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
			$testimonials->image = $image;
		}

		$testimonials->name = $r->name;
		$testimonials->message = $r->message;
		$testimonials->position = $r->position;
		$testimonials->save();

		// Success Message  
		$r->session()->flash('success', 'Testimonials Successfully Modified');

		return redirect(route('testimonials'));
    }

    public function delete(Request $r)
    {
    	GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	// Delete Data
		Testimonials::where('id', $r->id)->delete();

		// Success Message
		$r->session()->flash('success', 'Testimonials Successfully Deleted');

		return redirect(route('testimonials'));
    }
}
