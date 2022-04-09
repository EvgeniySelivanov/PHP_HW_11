<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Main page';
        $subtitle = '<em>italic</em>';
        $users = ['Petya', 'Vasya'];
        
      $importantPost=Post::where('important','=',1)->get();
        return view('main', compact('title', 'subtitle', 'users','importantPost'));
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
