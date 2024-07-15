<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
        $user = Auth::user();
        $user_id = $user->id;
        $comment = [
            'post_id' => $data['post_id'],
            'user_id' => $user->id,
            'content' => $data['content']
        ];
        Comment::create($data);

        try{
            return redirect()->back()->with(['success' => 'Đã bình luận!']);
        }catch(\Exception $e) {
            return view('blogs.detail')->with(['error' => 'Vui lòng thử lại!']);
        }
    }
}
