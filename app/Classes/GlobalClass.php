<?php

namespace App\Classes;
use App\Posts;
use DB, Session, Response, Image, Auth;


class GlobalClass
{

	public function Upload ($files, $destinationPath, $thumb)
	{
		// Variable For Passing
		$filename = [];
		$file_count = count($files);

		for ($i=0; $i < $file_count ; $i++) { 
			// Image Upload Process
			$ext = $files[$i]->getClientOriginalExtension();
			$nm_file = rand(111111,999999).".".$ext;
			$upload = $files[$i]->move($destinationPath, $nm_file);
			$filename[] = $nm_file;

			// Create Thumbnail
			Image::make($destinationPath.'/'.$nm_file,array(
				'width' => $thumb,
				'grayscale' => false
			))->save($destinationPath.'/thumb-'.$nm_file);
		}

		return $filename;
	}

	public function Posts ($status = 'publish')
	{
		// Relation Posts with Users
		$posts = Posts::join('users', 'posts.id_user', '=', 'users.id')
			->select('posts.*', 'users.fullname')
			->where('posts.status', $status)
			->where('posts.deleted_at', null)
			->orderBy('created_at', 'DESC');

		return $posts;
	}

	public function Roleback ($status)
	{
		// Role user, if status exist then going to 404 error page
		for ($i=0; $i < count($status); $i++) { 
			if (Auth::user()->status == $status[$i]) {
				abort(404);
			}
		}
	}

}