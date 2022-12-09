<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($post_id, Request $request)
    {
        $page = isset($request->page) ? $request->page : 1;
        $perPage = isset($request->perPage) ? $request->perPage : 10;
        $skip = ($page-1) * $perPage;
        $totalData = Comment::count();
        $totalPage = ceil($totalData / $perPage);
        
        return [
            "totalData" => $totalData,
            "totalPage" => $totalPage,
            "data" => Comment::where("post_id", $post_id)->skip($skip)->take($perPage)->with("user")->get()
        ];
    }

    public function create(Request $request)
    {
        return Comment::create($request->all());
    }

    public function update($id, Request $request)
    {
        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        return $comment->update();
    }

    public function delete($id)
    {
        return Comment::find($id)->delete();
    }
}
