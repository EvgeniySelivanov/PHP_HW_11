<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $title = 'Main page';
        $subtitle = '<em>italic</em>';
        $users = ['Petya', 'Vasya'];
        $categories=Category::all();
      
        return view('main', compact('title', 'subtitle', 'users','categories'));
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
