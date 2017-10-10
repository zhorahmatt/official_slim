<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, Session, GlobalClass, Auth;

class TeamController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Get Data
		$data['team'] = DB::table('users')->where('deleted_at', null)->get();

		return view('admin.team.index', $data);
	}

	public function profile()
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Get Data
		$data['team'] = DB::table('users')->where('username', Auth::user()->username)->first();
		$data['posts'] = DB::table('posts')->where('id_user', Auth::user()->id)->count();
		$data['pages'] = DB::table('pages')->where('id_user', Auth::user()->id)->count();

		return view('admin.team.profile', $data);
	}

	public function create()
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		return view('admin.team.create');
	}

	public function store(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Validation
		$this->validate($r,[
			'fullname'=>'required',
			'username'=>'required|max:30|unique:users',
			'email'=>'required|email|max:70|unique:users',
			'status'=>'required',
			'password'=>'required|min:5'
		]);

		$team = new User();

		// Upload Image
		$destination = public_path('uploaded');
		$image_arr = GlobalClass::Upload($r->file('image'), $destination, 200);
		$image = implode(',',$image_arr);
		
		// Make copies to media
		if (!file_exists(public_path('uploaded/media'))) {
			mkdir(public_path('uploaded/media'), 0777, true);
		}
		copy(public_path('uploaded').'/'.$image, public_path('uploaded/media').'/'.$image);
		copy(public_path('uploaded').'/thumb-'.$image, public_path('uploaded/media').'/thumb-'.$image);
		
		// Store Data
		$team->fullname = $r->fullname;
		$team->username = $r->username;
		$team->email = $r->email;
		$team->status = $r->status;
		$team->image = $image;
		$team->password = bcrypt($r->password);
		$team->save();

		// Success Message	
		$r->session()->flash('success', 'User Successfully Added');

		return redirect(route('team'));
	}

	public function edit($id)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		try
		{
			// Get Data
			$team = User::findOrFail($id);
			$data['team'] = $team;

			return view('admin.team.edit', $data);
		}
		catch(ModelNotFoundException $e)
		{
		    return redirect()->route('team');
		}
	}

	public function update ($id, Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		$team = User::find($id);

		// Validation
		$this->validate($r,[
			'fullname'=>'required',
			'username'=>'required|max:30|unique:users,username,'.$team->id,
			'email'=>'required|email|max:70|unique:users,email,'.$team->id,
			'status'=>'required',
		]);

		// Upload Image
		if ($r->hasFile('image')) 
		{
			// Remove Old Image
			$old = DB::table('users')->where('id', $id)->first();
			@unlink(public_path('uploaded').'/'.$old->image);
			@unlink(public_path('uploaded').'/thumb-'.$old->image);

			// Upload Image
			$destination = public_path('uploaded');
			$image_arr = GlobalClass::Upload($r->file('image'), $destination, 200);
			$image = implode(',',$image_arr);

			// Make copies to media
			if (!file_exists(public_path('uploaded/media'))) {
				mkdir(public_path('uploaded/media'), 0777, true);
			}
			copy(public_path('uploaded').'/'.$image, public_path('uploaded/media').'/'.$image);
			copy(public_path('uploaded').'/thumb-'.$image, public_path('uploaded/media').'/thumb-'.$image);
			
			// Save to DB
			$team->image = $image;
		}

		// Update DB
		$team->fullname = $r->fullname;
		$team->username = $r->username;
		$team->email = $r->email;
		$team->status = $r->status;
		if ($r->password != '') {
			$team->password = bcrypt($r->password);
		}
		$team->save();

		// Success Message
		$r->session()->flash('success', 'User Data Successfully Modified');

		return redirect(route('team'));
	}

	public function delete(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Delete Data
		User::where('id', $r->id)->delete();

		// Success Message
		$r->session()->flash('success', 'User Successfully Deleted');

		return redirect(route('team'));
	}
}
