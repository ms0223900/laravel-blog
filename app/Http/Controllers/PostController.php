<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->postModel = $post;
    }

    private function get_posts_by_model() {
        $posts = $this->postModel->with(['comment_list'])->get();
        return $posts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 以下三個方式生成的結果是「等價」的
        $posts = $this->get_posts_by_model();
        // $posts = Post::with(['comment_list'])->get(); // 用with來生成
        // echo($posts);

        // $posts = Post::all(); // 不加上任何方法來生成collection
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
        // 以下兩個是一樣結果的
        // $target_post = Post::with(['comment_list'])->find($post->id);
        // return $target_post;

        $target_post = $this->postModel->with(['comment_list'])->findOrFail($post->id);
        return $target_post;

        // return Post::all()->where('id', $post->id); // 這會給「沒有comment_list」的陣列
        return Post::with(['comment_list'])->where('id', $post->id)->get(); // 這會給陣列
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
