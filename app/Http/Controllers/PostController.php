<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function Post()
    { 
    	$category=DB::table('categories')->get();
    	return view('posts.writePost')->with('category', $category);
    }

    public function insertPost(Request $insert)
    {
    	$validatedData = $insert->validate([
	        'title' => 'required|max:125',
	        'details' => 'required',
	        'image' => 'required|mimes:jpeg,jpg,png,PNG|max:1000',
	    	]);
    	$data=array();
    	$data['title']=$insert->title;
    	$data['details']=$insert->details;
    	$data['categories_id']=$insert->categories_id;
    	$image=$insert->file('image');
  
    	if ($image) {
    		$image_name=hexdec(uniqid());
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='public/frontend/image/postimg/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		$data['image']=$image_url;
    		DB::table('posts')->insert($data);
    		$notification = array(
                'message' => 'Successfully Post Insert!',
                'alert-type' => 'success');
            return Redirect()->route('allPost')->with($notification);
    	}else{
    		DB::table('posts')->insert($data);
    		$notification = array(
                'message' => 'Successfully Post Insert!',
                'alert-type' => 'success');
            return Redirect()->route('allPost')->with($notification);
    	}

    }

    public function allPost ()
    {
    	$post=DB::table('posts')
    	      ->join('categories','posts.categories_id','categories.id')
    	      ->select('posts.*','categories.name')
    	      ->get();
    	return view('posts.allPost',compact('post'));
    	
    	//return response()->json($post);
    }

    public function viewPost($id)
    {
        $view=DB::table('posts')
    	      ->join('categories','posts.categories_id','categories.id')
    	      ->select('posts.*','categories.name')
    	      ->where('posts.id', $id)
    	      ->first();
    	return view('posts.viewPost',compact('view'));
    }

    public function editPost($id)
    {
    	$category=DB::table('categories')->get();
    	$edit=DB::table('posts')->where('id', $id)->first();
    	return view('posts.editPost',compact('edit','category'));
    }

    public function updatePost(Request $update,$id)
    {
    	$validatedData = $update->validate([
	        'title' => 'required|max:125',
	        'details' => 'required',
	        'image' => 'mimes:jpeg,jpg,png,PNG|max:1000',
	    	]);
    	$data=array();
    	$data['title']=$update->title;
    	$data['details']=$update->details;
    	$data['categories_id']=$update->categories_id;
    	$image=$update->file('image');
  
    	if ($image) {
    		$image_name=hexdec(uniqid());
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='public/frontend/image/postimg/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		$data['image']=$image_url;
    		unlink($update->old_photo);
    		DB::table('posts')->where('id', $id)->update($data);
    		$notification = array(
                'message' => 'Successfully Post Update!',
                'alert-type' => 'success');
            return Redirect()->route('allPost')->with($notification);
    	} else{
    		$data['image']=$update->old_photo;
    		DB::table('posts')->where('id', $id)->update($data);
    		 $notification = array(
                'message' => 'Successfully Post Update!',
                'alert-type' => 'success');
            return Redirect()->route('allPost')->with($notification);
    	}
    }

    public function deletePost($id)
    {
       $post=DB::table('posts')->where('id', $id)->first();
       $image=$post->image;
       
       $delete=DB::table('posts')->where('id', $id)->delete();

        if ($delete) 
        {
            unlink($image);
            $notification = array(
                'message' => 'Successfully Categorie Delete!',
                'alert-type' => 'success');
            return Redirect()->back()->with($notification);
        } else

        {
            $notification = array(
                'message' => 'Something went worng!',
                'alert-type' => 'error');
            return Redirect()->back()->with($notification);
        }
       
    }
}
