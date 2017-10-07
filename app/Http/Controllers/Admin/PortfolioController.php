<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB, GlobalClass;

class PortfolioController extends Controller
{
    public function index()
    {
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
    	$portfolio = DB::table('pages_work')->orderBy('created_at', 'DESC')->paginate(10);
		$data['portfolio'] = $portfolio;

    	return view('admin.portfolio.index', $data);
    }

    public function create()
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		return view('admin.portfolio.create');
	}

	public function store(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Validation Store
		$this->validate($r,[
			'title'=>'required',
			'content'=>'required',
			'image'=>'required',
			'tag'=>'required'
		]);

		$count = DB::table('pages_work')->count();
		if ($count > 0) {
			$sort = DB::table('pages_work')->select('sort')->orderBy('sort', 'DESC')->first();
		} else {
			$sort = $count;
		}

		$portfolio = new Portfolio();

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

		$portfolio->title = $r->title;
		$portfolio->content = $r->content;
		$portfolio->tag = $r->tag;
		$portfolio->sort = $count > 0 ? $sort->sort + 1 : $sort + 1;;
		$portfolio->image = $image;
		$portfolio->link = $r->link;
		$portfolio->save();

		// Success Message  
		$r->session()->flash('success', 'Portfolio Successfully Added');

		return redirect(route('portfolio'));
	}

	public function edit($id)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		try
		{
		    $portfolio = Portfolio::findOrFail($id);
			$data['portfolio'] = $portfolio;

			return view('admin.portfolio.edit', $data);
		}
		catch(ModelNotFoundException $e)
		{
		    return redirect()->route('portfolio');
		}
	}

	public function update($id, Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Validation Update
		$this->validate($r,[
			'title'=>'required',
			'content'=>'required',
			'tag'=>'required'
		]);

		$count = DB::table('pages_work')->count();
		if ($count > 0) {
			$sort = DB::table('pages_work')->select('sort')->orderBy('sort', 'DESC')->first();
		}

		$portfolio = Portfolio::find($id);

		// Upload Image
		if ($r->hasFile('image')) {
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
			$portfolio->image = $image;
		}

		$portfolio->title = $r->title;
		$portfolio->content = $r->content;
		$portfolio->tag = $r->tag;
		$portfolio->sort = $sort->sort + 1;
		$portfolio->link = $r->link;
		$portfolio->save();

		// Success Message  
		$r->session()->flash('success', 'Portfolio Successfully Modified');

		return redirect(route('portfolio'));
	}

	public function delete(Request $r)
	{
		GlobalClass::Roleback(['Customer Service', 'Writer']);
		
		// Delete Data
		Portfolio::where('id', $r->id)->delete();

		// Success Message
		$r->session()->flash('success', 'Portfolio Successfully Deleted');

		return redirect(route('portfolio'));
	}
}
