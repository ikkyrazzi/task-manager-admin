<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function index()
    {
        $attachments = Attachment::all();
        return view('admin.attachments.index', compact('attachments'));
    }

    public function show(Attachment $attachment)
    {
        return view('admin.attachments.show', compact('attachment'));
    }

    public function destroy(Attachment $attachment)
    {
        $attachment->delete();

        return redirect()->route('admin.attachments.index');
    }
}
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function index()
    {
        $attachments = Attachment::all();
        return view('admin.attachments.index', compact('attachments'));
    }

    public function show(Attachment $attachment)
    {
        return view('admin.attachments.show', compact('attachment'));
    }

    public function destroy(Attachment $attachment)
    {
        $attachment->delete();

        return redirect()->route('admin.attachments.index');
    }
}
