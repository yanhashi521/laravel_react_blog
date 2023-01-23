<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia; //追加
use App\Models\Post;

class PostController extends Controller
{
    // 追加
    public function index(Post $post)
    {
        return Inertia::render("Post/Index", ["posts" => $post->get()]);
        //phpでいうviewがReactだとInertia::Renderになっている．
        //phpではwithを用いて引数を指定していたが，ReactだとURIの次にくる第二引数で指定すれば良い
    }
    public function show(Post $post) 
    {
        return Inertia::render("Post/show", ["post" => $post]);
    }
}
