<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       /* $categories=Category::all(); */

       $categories=Category::withCount('posts')->orderByDesc('created_at')->paginate(3);
       return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
     $request->validate([
            'name' => 'required|max:255|min:3',//пишем поля формы и правила валидации
            'description' => 'required',
        ]);
      // dd($request->all());
      $category=new Category();
      $category->name=$request->name;
      $category->description=$request->description;
      $category->save();
        return redirect('/admin/categories')->with('success', 'Category' . $category->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);//ищи или выведи ошибку
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',//пишем поля формы и правила валидации
            'description' => 'required',
        ]);
     
      $category=Category::findOrFail($id);//ищи или выведи ошибку
      $category->name=$request->name;
      $category->description=$request->description;
      $category->save();
        return redirect('/admin/categories');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete(); 
        return redirect('/admin/categories'); 
    }
}
