<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Task;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created attachment in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('attachments', 'public');

        Attachment::create([
            'task_id' => $request->task_id,
            'file_path' => $path,
        ]);

        return redirect()->route('tasks.show', $request->task_id)->with('success', 'Attachment added successfully.');
    }

    /**
     * Remove the specified attachment from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);
        $task_id = $attachment->task_id;
        $attachment->delete();

        return redirect()->route('tasks.show', $task_id)->with('success', 'Attachment deleted successfully.');
    }
}