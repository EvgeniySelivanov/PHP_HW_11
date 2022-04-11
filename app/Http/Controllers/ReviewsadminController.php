<?php

namespace App\Http\Controllers;
use App;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReviewsadminController extends Controller
{
    public function index()
    {
        $reviews=Reviews::all();
        return view('reviewsadmin',compact('reviews'));    
    }




    public function createReviews()


     {
    $username=$_GET['name'];
    $text=$_GET['description'];
    $time_date=date('l jS \of F Y h:i:s A');
    DB::insert('insert into reviews (username, text,time_date) values (?, ?, ?)', [$username ,$text,$time_date]);
    return redirect('/reviewsadmin');
    }



    public function editReviews()
    {   $id=$_GET['id'];
        $reviews=Reviews::find($id);//ищи или выведи ошибку
        return view('editreviews',compact('reviews'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|max:255|min:3',//пишем поля формы и правила валидации
            'text' => 'required',
        ]);
     
      $reviews=Reviews::findOrFail($id);//ищи или выведи ошибку
      $reviews->username=$request->username;
      $reviews->text=$request->text;
      $reviews->save();
        return redirect('/reviewsadmin');  
    }

    public function deleteReviews()
    {   $id=$_GET['id'];
        DB::delete('delete from reviews WHERE id=?',[$id]);
        $posts=App\Models\Reviews::getReviews();
        return redirect('/reviewsadmin');
    }

  
}
 