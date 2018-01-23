<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Messages;
use DB, GlobalClass;

class MessagesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		GlobalClass::Roleback(['Writer']);
		
		//Link Pagination
		$linkpage   = "mail?page=";
		$data['linkpage'] = $linkpage;
		
		// Get Messages from DB
		$messages = Messages::orderBy('id', 'DESC')->paginate(20);
		$data['messages'] = $messages;

		return view('admin.messages.index', $data);
	}

	public function compose()
	{
		GlobalClass::Roleback(['Writer']);
		
		return view('admin.messages.create');
	}

	public function trash()
	{
		GlobalClass::Roleback(['Writer']);
		
		//Link Pagination
		$linkpage   = "trash?page=";
		$data['linkpage'] = $linkpage;

		// Get Messages from DB
		$messages = Messages::onlyTrashed()->orderBy('id', 'ASC')->paginate(20);
		$data['messages'] = $messages;

		return view('admin.messages.trash', $data);
	}

	public function sent()
	{
		GlobalClass::Roleback(['Writer']);
		
		return view('admin.messages.sent');
	}

	public function detail($id)
	{
		GlobalClass::Roleback(['Writer']);
		
		DB::update('update messages set read_status = "1" where id = ?', [$id]);

		// Get Messages from DB
		$messages = DB::table('messages')->where('id', $id)->first();
		$data['message'] = $messages;

		return view('admin.messages.detail', $data);
	}

	public function delete(Request $r)
	{
		GlobalClass::Roleback(['Writer']);
		
		// Get Messages from DB
		$messages = DB::table('messages')->where('id', $r->id)->first();
		if ($messages->deleted_at != null) {
			Messages::where('id', $r->id)->forceDelete();
		} else {
			Messages::where('id', $r->id)->delete();
		}
		
		// Success Message
		$r->session()->flash('success', 'Message Successfully Deleted');

		return redirect(route('messages'));
	}
}
