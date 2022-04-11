<?php

namespace App\Http\Controllers;
use App;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReviewsController extends Controller
{
    public function index()
    {
        $reviews=Reviews::all();
        return view('reviews',compact('reviews'));    
    }

    public function createReviews()
     {
    $username=$_GET['name'];
    $text=$_GET['description'];
    $time_date=date('l jS \of F Y h:i:s A');
    DB::insert('insert into reviews (username, text,time_date) values (?, ?, ?)', [$username ,$text,$time_date]);
    return redirect('/reviews');
    }
 
}
 