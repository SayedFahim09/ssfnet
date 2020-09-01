<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategorieController extends Controller
{
    public function addCategorie()
    {
    	return view('posts.categorie.addCategorie');
    }

    public function insertCategorie(Request $insert)
    {
    	
	    	$validatedData = $insert->validate([
	        'name' => 'required|unique:categories|max:255|min:4',
	        'slug' => 'required|unique:categories|max:255|min:4',
	    	]);

    	$data = array();
    	$data['name']=$insert->name;
    	$data['slug']=$insert->slug;
    	$categorie=DB::table('categories')->insert($data);
    	if ($categorie) {
    		$notification = array(
                'message' => 'Successfully Categorie Insert!',
                'alert-type' => 'success');
    		return Redirect()->route('allCategorie')->with($notification);
    	}else{
    		$notification = array(
                'message' => 'Something went worng!',
                'alert-type' => 'error');
    		return Redirect()->back()->with($notification);

    	}   	


    	//return response()->json($data);
    	//echo "<pre>";
    	//print_r($data);

    }
    public function allCategorie()
    {
        $categorie=DB::table('categories')->get();

        return view('posts.categorie.allCategorie',compact('categorie'));
        
        //return response()->json($categorie);
    }
    public function viewCategorie($id)
    {
        
        $categorie=DB::table('categories')->where('id', $id)->first();
        return view('posts.categorie.viewCategorie')->with('category', $categorie);
        //return response()->json($categorie);  
    }
    public function deleteCategorie($id)
    {
        $delete=DB::table('categories')->where('id', $id)->delete();

            $notification = array(
                'message' => 'Successfully Categorie Delete!',
                'alert-type' => 'success');
            return Redirect()->back()->with($notification);

    }
    public function editCategorie($id)
    {
        $edit=DB::table('categories')->where('id', $id)->first();
        return view('posts.categorie.editCategorie')->with('category', $edit);
    }
    public function updateCategorie(Request $update,$id)
    {
       $validatedData = $update->validate([
            'name' => 'required|max:255|min:4',
            'slug' => 'required|max:255|min:4',
            ]);

        $data = array();
        $data['name']=$update->name;
        $data['slug']=$update->slug;
        $categorie=DB::table('categories')->where('id', $id)->update($data);
        if ($categorie) {
            $notification = array(
                'message' => 'Successfully Categorie Update!',
                'alert-type' => 'success');
            return Redirect()->route('allCategorie')->with($notification);
        }else{
            $notification = array(
                'message' => 'Nothing To Update!',
                'alert-type' => 'error');
            return Redirect()->back()->with($notification);

        }  
    }
}
