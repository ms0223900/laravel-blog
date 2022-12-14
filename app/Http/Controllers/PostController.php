<?php

namespace App\Http\Controllers;

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
        // 
        $posts = Post::all();
        // echo($posts);
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Post::create([
            'title' => $request->input('title'),
            'subTitle' => $request->input('subTitle'),
            'content' => $request->input('content'),
        ]);

        return Post::all();
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
        return Post::findOrFail($post->id); // 這會給not found或單一數值
        // return Post::all()->where('id', $post->id); // 這會給陣列
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
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
        $target = Post::findOrFail($post->id);

        $target->update($request->input());

        // 下面這方法會變成「每個欄位」都必填
        // $target->update([
        //     'title' => $request->input('title'),
        //     'subTitle' => $request->input('subTitle'),
        //     'content' => $request->input('content'),
        // ]);
        return $target;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $deleted = $this->show($post)->delete();
        return $deleted;
    }
}
