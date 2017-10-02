<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, GlobalClass;

class MenusController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		$data['menus_header'] = DB::table('menus')->where('parent', '0')->orderBy('sort')->get();
		$data['url_posts'] = DB::table('posts')->where('deleted_at', null)->orderBy('title')->get();
		$data['url_pages'] = DB::table('pages')->where('deleted_at', null)->orderBy('title')->get();

		return view('admin.menus.index', $data);
	}

	public function store(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Validation
		$this->validate($r,[
			'menu_title'	=> 'required',
			'url'			=> 'required'
		]);

		DB::insert('insert into menus (menu_title, url, parent) values (?, ?, ?)', [
				$r->menu_title,
				$r->url,
				$r->parent
			]);

		// Success Message	
		$r->session()->flash('success', 'Menu Successfully Added');

		return redirect(route('menus'));
	}

	public function update(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Validation
		$this->validate($r,[
			'id'			=> 'required',
			'menu_title'	=> 'required',
			'url'			=> 'required'
		]);

		DB::update('update menus set menu_title = ?, url = ?, parent = ? where id = ?', [
				$r->menu_title,
				$r->url,
				$r->parent,
				$r->id
			]);

		// Success Message	
		$r->session()->flash('success', 'Menu Successfully Modified');

		return redirect(route('menus'));
	}

	public function drag(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		$id = explode(',', $r->id_menus);
		$type = explode(',', $r->type);
		$parent = '';
		for ($i=0; $i < count($id); $i++) {
			if ($type[$i] == 'menu') {
				$parent = $id[$i];
				DB::update('update menus set sort = ?, parent = "0" where id = ?', [
					$i,
					$id[$i]
				]);
			} else {
				DB::update('update menus set sort = ?, parent = ? where id = ?', [
					$i,
					$parent,
					$id[$i]
				]);
			}
		}

		// Success Message	
		$r->session()->flash('success', 'Menu Successfully Modified');

		return redirect(route('menus'));
	}

	public function delete(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Delete Data
		DB::delete('delete from menus where id = ?', [$r->id]);

		// Success Message
		$r->session()->flash('success', 'Menu Successfully Deleted');

		return redirect(route('menus'));
	}
}
