<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $page = isset($request->page) ? $request->page : 1;
        $perPage = isset($request->perPage) ? $request->perPage : 10;
        $skip = ($page-1) * $perPage;
        $totalData = Post::count();
        $totalPage = ceil($totalData / $perPage);
        
        return [
            "totalData" => $totalData,
            "totalPage" => $totalPage,
            "data" => Post::skip($skip)->take($perPage)->with("previewComments")->get()
        ];
    }

    public function detail($id)
    {
        return Post::find($id);
    }

    public function create(Request $request)
    {
        return Post::create($request->all());
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        return $post->update();
    }

    public function delete($id)
    {
        return Post::find($id)->delete();
    }
}
