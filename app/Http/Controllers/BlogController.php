<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

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
}
