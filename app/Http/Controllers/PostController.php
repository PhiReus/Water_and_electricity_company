<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        // $imagesss = Post::with('images')->get();
        // $gr = [];
        // foreach($imagesss as $image) {
        //     foreach($image->images as $vl) {
        //         if(empty($vl->image_path)) continue;
        //         $gr[] = $vl->image_path;
        //     }
        // }

        // dd($gr);
        $users = User::all();
        $images = Image::all();
        $params = [
            'posts' => $posts,
            'users' => $users,
            'images' => $images,
        ];

        return view('posts.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        $users = User::all();
        $categories = Category::all();

        $params = [
            'posts' => $posts,
            'users' => $users,
            'categories' => $categories,
        ];

        return view('posts.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $post = Post::create($data);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $image_name = $image->getClientOriginalName();
                $path = $image->move(public_path('post'), $image_name);
                Image::create([
                    'post_id' => $post->id,
                    'image_path' => $image_name,
                ]);
            }
        }

        try{
            return redirect()->route('posts.index')->with(['success' => 'Thêm bài viết thành công!']);
        }catch(\Exception $e) {
            return view('posts.create')->with(['error' => 'Vui lòng thử lại!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
