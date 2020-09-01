<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PagesController extends Controller
{
    public function Index()
    {
       $post=DB::table('posts')
             ->join('categories','posts.categories_id','categories.id')
             ->select('posts.*','categories.name','categories.slug')
             ->paginate(3);
        return view('index')->with('post', $post);
    }



    public function About()
    {
    	return view('pages.about_us');
    }

    public function Contact()
    {
    	return view('pages.contact_us');
    }
	
	

}
