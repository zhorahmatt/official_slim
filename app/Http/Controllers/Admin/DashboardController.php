<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, GlobalClass;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
    	// Counts
        $data['users_count'] = DB::table('users')->where('deleted_at', null)->count();
        $data['visitors'] = DB::table('visitors')->select('date', DB::raw('count(*) as count'))->groupBy('date')->get();
        $data['visitors_count'] = DB::table('visitors')->select('date')->where('date', date('Y-m-d'))->count();
        $data['posts_count'] = DB::table('posts')->where('deleted_at', null)->count();
        $data['messages_count'] = DB::table('messages')->where('deleted_at', null)->count();
        
        // Get Data Team
        $data['users'] = DB::table('users')->where('deleted_at', null)->limit(5)->get();

        // Get Data Visitor Today
        $data['visitors_detail'] = DB::table('visitors')->select('ip_address', 'country', 'city', DB::raw('sum(hits) as sum'))->groupBy('ip_address', 'country', 'city')->where('date', date('Y-m-d'))->get();
    	return view('admin.dashboard.index', $data);
    }
}
