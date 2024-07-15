<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index () {
        $posts = Post::all();
        $images = Image::all();
        $params = [
            'posts' => $posts,
            'images' => $images
        ];
        return view('blogs.index', $params);
    }
    public function show($id) {
        $post = Post::find($id);
        $user = Auth::user();
        // $img_id = $post->images->pluck('id')->toArray();
        // $img = Image::where('id', $img_id)->get();

        // $comment_id = $post->comments->pluck('id')->toArray();
        // $comment = Comment::where('id', $comment_id)->get();
        $comments = Comment::where('post_id', $post->id)->get();
        $params = [
            'post' => $post,
            'comments' => $comments,
            'user' => $user,
        ];


        return view('blogs.detail', $params);
    }
}
