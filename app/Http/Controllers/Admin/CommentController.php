<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('_admins.comments.index', compact('comments'));
    }

    public function show(Comment $comment)
    {
        return view('_admins.comments.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('_admins.comments.index');
    }
}
