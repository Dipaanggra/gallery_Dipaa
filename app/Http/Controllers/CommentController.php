<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'photo_id' => 'required|exists:photos,id',
        ]);

        $request->user()->comments()->create([
            'comment' => $request->comment,
            'photo_id' => $request->photo_id,
        ]);

        return redirect()->back();
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->back();
    }
}
