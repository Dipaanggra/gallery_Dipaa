<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'photo_id' => 'required|exists:photos,id',
        ]);

        $request->user()->likes()->create([
            'photo_id' => $request->photo_id,
        ]);

        return redirect()->back();
    }
    public function destroy(Like $like)
    {
        $like->delete();

        return redirect()->back();
    }
}
