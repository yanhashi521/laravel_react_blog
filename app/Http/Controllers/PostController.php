<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller {
    public function index(Post $post) {
        return Inertia::render("Post/Index", ["posts" => $post->get()]);
        //phpでいうviewがReactだとInertia::Renderになっている．
        //phpではwithを用いて引数を指定していたが，ReactだとURIの次にくる第二引数で指定すれば良い
    }
    
    public function create() {
        return Inertia::render("Post/Create");
    }
    
    public function store(PostRequest $request, Post $post) {
        $input = $request->all();
        $post->fill($input)->save();
        return redirect("/posts/" . $post->id);
    }
    
    public function show(Post $post) {
        return Inertia::render("Post/show", ["post" => $post]);
    }
}
