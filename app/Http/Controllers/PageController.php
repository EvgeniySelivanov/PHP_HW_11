<?php

namespace App\Http\Controllers;
use App\Models\Reviews;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $title='Reviews Page';
        $reviews=Reviews::all();
        return view('page',compact('reviews','title'));
    }
}
 