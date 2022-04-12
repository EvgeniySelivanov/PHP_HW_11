<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
    $importantPost=Post::where('important','=',1)->get();
    return view('main', compact('importantPost'));
    }



    public function categoryPost($id)
    {
        $importantPost=Post::where('category_id','=',$id)->get();
        return view('main', compact('importantPost'));
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function getForm(Request $request)
    {
       // dd($request);
       /*  dump($request); */
       $email=$request->email;
       $pass=$request->pass;
       $check=$request->check;


        return redirect('/');


    }
}
