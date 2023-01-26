<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;

class PostController extends Controller {
    public function index(Post $post) {
        return Inertia::render("Post/Index", ["posts" => Post::with("category")->get()]);
        //phpでいうviewがReactだとInertia::Renderになっている．
        //phpではwithを用いて引数を指定していたが，ReactだとURIの次にくる第二引数で指定すれば良い
    }
    
    
    public function edit(Post $post) {
        return Inertia::render("Post/Edit", ["post" => $post]);
        
    }
    
    public function update(PostRequest $request, Post $post) {
        $input = $request->all();
        $post->fill($input)->save();
        return redirect("/posts/" . $post->id);
    }
    
    
    public function store(PostRequest $request, Post $post) {
        $input = $request->all();
        $post->fill($input)->save();
        return redirect("/posts/" . $post->id);
    }
    
    public function show(Post $post) {
        return Inertia::render("Post/Show", ["post" => $post->load('category')]);
    }
    
    public function delete(Post $post) {
        $post->delete();
        return redirect("/posts");
    }
    public function create(Category $category) {
        return Inertia::render("Post/Create", ["categories" => $category->get()]);
    }
}
