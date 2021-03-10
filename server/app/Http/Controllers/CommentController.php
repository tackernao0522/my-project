<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment)
    {
        $user = auth()->user();
        $comment->fill($request->validated());
        $comment->user_id = $user->id;
        $comment->save();

        return back()->with('status', 'コメントを投稿しました。');
    }
}
