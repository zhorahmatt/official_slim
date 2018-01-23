<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GlobalClass;

class MediaController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		GlobalClass::Roleback(['Customer Service']);

		if (!file_exists(public_path('uploaded/media'))) {
			mkdir(public_path('uploaded/media'), 0777, true);
		}
		$dir = public_path('uploaded/media');
		$files = scandir($dir);

		// List Var
		$image = [];
		$doc = [];
		$video = [];
		$audio = [];

		for ($i=0; $i < count($files); $i++) {
			// Conditions for find image
			$ext = substr($files[$i], -3);
			if ($ext == 'jpg' || $ext == 'peg' || $ext == 'png') {
				array_push($image, $files[$i]);
			} else if ($ext == 'pdf') {
				array_push($doc, $files[$i]);
			} else if ($ext == 'mp4') {
				array_push($video, $files[$i]);
			} else if ($ext == 'mp3') {
				array_push($audio, $files[$i]);
			}
		}

		// Data
		$data['images'] = $image;
		$data['docs'] = $doc;
		$data['videos'] = $video;
		$data['audios'] = $audio;

		return view('admin.media.index', $data);
	}

	public function upload(Request $r)
	{
		GlobalClass::Roleback(['Customer Service']);

		// Upload Image
		$destination = public_path('uploaded/media');
		$image_arr = GlobalClass::Upload($r->file('file'), $destination, 700);
		$image = implode(',',$image_arr);
	
		return redirect(route('media'));
	}

	public function froala()
	{
		GlobalClass::Roleback(['Customer Service']);
		
		if (!file_exists(public_path('uploaded/media'))) {
			mkdir(public_path('uploaded/media'), 0777, true);
		}
		$dir = public_path('uploaded/media');
		$files = scandir($dir);

		$image = Array();
		$image_json = Array();

		for ($i=0; $i < count($files); $i++) {
			// Conditions for find image
			$ext = substr($files[$i], -3);
			$thumb = substr($files[$i], 0, 5);
			if ($ext == 'jpg' || $ext == 'peg' || $ext == 'png') {
				if ($thumb != 'thumb') {
					array_push($image, $files[$i]);
				}
			}
		}

		for ($j=0; $j < count($image); $j++) {
			$image_json[$j] = Array(
					'url'	=> asset('uploaded/media').'/'.$image[$j],
					'thumb'	=> asset('uploaded/media').'/thumb-'.$image[$j]
				);
		}

		return response()->json($image_json);
	}

	public function delete(Request $r)
	{
		GlobalClass::Roleback(['Customer Service']);
		
		$image = str_replace('thumb-', '', $r->name);
		// Delete Image
		unlink(public_path('uploaded/media').'/'.$image);
		unlink(public_path('uploaded/media').'/thumb-'.$image);
		
		return redirect(route('media'));
	}
}
