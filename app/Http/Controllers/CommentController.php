<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'content' => 'required|string',
        ]);

        Comment::create([
            'task_id' => $request->task_id,
            'user_id' => Auth::id(),
            'content' => $request->content,
        ]);

        return redirect()->route('tasks.show', $request->task_id)->with('success', 'Comment added successfully.');
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $task_id = $comment->task_id;
        $comment->delete();

        return redirect()->route('tasks.show', $task_id)->with('success', 'Comment deleted successfully.');
    }
}