<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        //test role
/*     $roles=User::find(1)->roles;   
    $users=Role::find(1)->users;

        dd($users); */

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
      //dump($request->all());
      $request->validate([
          'email'=>'required|email',
          'message'=>'required|min:3',
      ]);
      $admins=Role::where('name','=','admin')->first()->users;
    
      Mail::to($admins)->send(new ContactMail($request->email,$request->message));

    }
}


