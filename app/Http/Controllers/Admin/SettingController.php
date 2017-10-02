<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Session, GlobalClass;

class SettingController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		$data['setting'] = DB::table('setting')->first();

		return view('admin.setting.index', $data);
	}

	public function update(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Validation
		$this->validate($r, [
			'meta_title' 		=> 'required',
			'meta_description'	=> 'required',
			'meta_keyword'		=> 'required',
			'timezone' 			=> 'required',
			'email' 			=> 'required|email',
			'phone' 			=> 'required',
		]);

		// Maintenance Status
		$maintenance = '0';
		if ($r->maintenance == 'on') {
			$maintenance = '1';
		} else {
			$maintenance = '0';
		}

		// Update DB
		DB::update('update setting set meta_title = ?, meta_description = ?, meta_keyword = ?, timezone = ?, maintenance = ?, email = ?, phone = ?, facebook = ?, twitter = ?, google = ?, linkedin = ?, address = ?, youtube = ?, instagram = ?', [
			$r->meta_title,
			$r->meta_description,
			$r->meta_keyword,
			$r->timezone,
			$maintenance,
			$r->email,
			$r->phone,
			$r->facebook,
			$r->twitter,
			$r->google,
			$r->linkedin,
			$r->address,
			$r->youtube,
			$r->instagram
		]);

		// Upload Image
		$og_image = '';
		if ( $r->hasFile('og_image') ) {
			// Remove Old Image
			$old = DB::table('setting')->first();
			@unlink(resource_path('uploaded').'/'.$old->og_image);
			@unlink(resource_path('uploaded').'/thumb-'.$old->og_image);

			// Prepare for upload
			$destination = resource_path('uploaded');
			$og_image_arr = GlobalClass::Upload($r->file('og_image'), $destination, 500);
			$og_image = implode(',',$og_image_arr);
			
			// Save DB
			DB::update('update setting set og_image = ?', [$og_image]);
		}

		// Upload favicon
		$favicon = '';
		if ( $r->hasFile('favicon') ) {
			// Remove Old Image
			$old = DB::table('setting')->first();
			@unlink(resource_path('uploaded').'/'.$old->favicon);
			@unlink(resource_path('uploaded').'/thumb-'.$old->favicon);

			// Prepare for upload
			$destination = resource_path('uploaded');
			$favicon_arr = GlobalClass::Upload($r->file('favicon'), $destination, 16);
			$favicon = implode(',',$favicon_arr);
			
			// Save DB
			DB::update('update setting set favicon = ?', [$favicon]);
		}

		// Upload favicon
		$logo = '';
		if ( $r->hasFile('logo') ) {
			// Remove Old Image
			$old = DB::table('setting')->first();
			@unlink(resource_path('uploaded').'/'.$old->logo);
			@unlink(resource_path('uploaded').'/thumb-'.$old->logo);

			// Prepare for upload
			$destination = resource_path('uploaded');
			$logo_arr = GlobalClass::Upload($r->file('logo'), $destination, 50);
			$logo = implode(',',$logo_arr);
			
			// Save DB
			DB::update('update setting set logo = ?', [$logo]);
		}
	
		// Success Message
		Session::flash('message', "Successfully update.");

		return redirect()->back();
	}
}
