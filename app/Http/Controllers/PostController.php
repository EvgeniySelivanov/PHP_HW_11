<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->orderByDesc('created_at')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all()->pluck('name','id')->all();

        return view('posts.create',['post'=>new Post(),'categories'=>$categories]);
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
            'name' => 'required|max:255|min:3',
            'content' => 'required',
            'thumbnail'=>'image',
        ]);

        $post = new Post();
        $post->fill($request->all());
        
      /*   $post->name = $request->name;
        $post->content = $request->content;
        $post->category_id =$request->category_id;
        $post->important=$request->important ? 1:0;
        */
        if($request->thumbnail){
            $fileName=$request->thumbnail->getClientOriginalName();
            $request->thumbnail->move(public_path('uploads'),$fileName);
            $post->thumbnail='uploads/' .$fileName;
        } 

        $post->save();

        return redirect('/posts')->with('success', 'Post ' . $post->name . ' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {$categories=Category::all()->pluck('name','id')->all();
        return view('posts.edit', ['post'=>$post,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
    public function changeImportant(Post $post){
       $post->important=$post->important==0?1:0;
       $post->save();
       return $post->important;
       
    }
}
