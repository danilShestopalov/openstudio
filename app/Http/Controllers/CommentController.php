<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $this->validate($request,[
           'body' => 'required|max:155'
        ]);

        Comment::create([
            'body' => $request->body,
            'creator_id' => Auth::id(),
            'post_id' => $id
        ]);

        return redirect(route('blog.show', $id));
    }
}
