<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Session, GlobalClass;

class AboutController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);

		$data['about'] = DB::table('pages_about')->first();
		$data['teams'] = DB::table('pages_about_team')->get();

		return view('admin.about.index', $data);
	}

	public function update(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);

		// Validation
		$this->validate($r, [
			'about' 		=> 'required',
			'vision'		=> 'required',
			'mission'		=> 'required',
			'founded'		=> 'required',
			'industry'		=> 'required'
		]);

		// Update DB
		DB::update('update pages_about set about = ?, vision = ?, mission = ?, founded = ?, industry = ?, maps = ?', [
			$r->about,
			$r->vision,
			$r->mission,
			$r->founded,
			$r->industry,
			$r->maps
		]);

		// Upload Image
		$image = '';
		if ( $r->hasFile('image') ) {
			// Remove Old Image
			$old = DB::table('setting')->first();
			@unlink(resource_path('uploaded').'/'.$old->image);
			@unlink(resource_path('uploaded').'/thumb-'.$old->image);

			// Prepare for upload
			$destination = resource_path('uploaded');
			$image_arr = GlobalClass::Upload($r->file('image'), $destination, 500);
			$image = implode(',',$image_arr);
			
			// Save DB
			DB::update('update pages_about set image = ?', [$image]);
		}
	
		// Success Message
		Session::flash('message', "Successfully update.");

		return redirect()->back();
	}

	public function employees()
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);

		$data['employees'] = DB::table('pages_about_team')->get();

		return view('admin.about.employees', $data);
	}

	public function employeesStore(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);

		// Validation Store
		$this->validate($r,[
			'name'=>'required',
			'position'=>'required',
			'image'=>'required',
		]);

		// Upload Image
		$destination = resource_path('uploaded');
		$image_arr = GlobalClass::Upload($r->file('image'), $destination, 400);
		$image = implode(',',$image_arr);

		DB::insert('insert into pages_about_team (name, position, image) values (?, ?, ?)', [
				$r->name,
				$r->position,
				$image
			]);
		
		// Make copies to media
		if (!file_exists(resource_path('uploaded/media'))) {
			mkdir(resource_path('uploaded/media'), 0777, true);
		}
		copy(resource_path('uploaded').'/'.$image, resource_path('uploaded/media').'/'.$image);
		copy(resource_path('uploaded').'/thumb-'.$image, resource_path('uploaded/media').'/thumb-'.$image);

		// Success Message  
		$r->session()->flash('success', 'New Employees Successfully Added');

		return redirect(route('about_employees'));
	}

	public function employeesUpdate(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);

		// Validation Update
		$this->validate($r,[
			'name'=>'required',
			'position'=>'required'
		]);

		DB::update('update pages_about_team set name = ?, position = ? where id = ?', [$r->name, $r->position, $r->id]);

		// Upload Image
		if ($r->hasFile('image')) 
		{
			// Remove Old Image
			$old = DB::table('pages')->where('id', $r->id)->first();
			@unlink(resource_path('uploaded').'/'.$old->image);
			@unlink(resource_path('uploaded').'/thumb-'.$old->image);

			// Upload Image
			$destination = resource_path('uploaded');
			$image_arr = GlobalClass::Upload($r->file('image'), $destination, 700);
			$image = implode(',',$image_arr);
			
			// Save to DB
			DB::update('update pages_about_team set image = ? where id = ?', [$image, $r->id]);
		}

		// Success Message  
		$r->session()->flash('success', 'Employees Successfully Modified');

		return redirect(route('about_employees'));
	}

	public function employeesDelete(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);

		// Delete Data
		DB::delete('delete from pages_about_team where id = ?', [$r->id]);

		// Success Message
		$r->session()->flash('success', 'Employees Successfully Deleted');

		return redirect(route('about_employees'));
	}
}
