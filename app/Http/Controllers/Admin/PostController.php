<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $this->validate($request,[
            'title' => 'required|max:30',
            'body' => 'required|max:1000',
        ]);

        $imageName = '';

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/uploads/posts/'), $imageName);
            $post->update([
                'title' => $request->title,
                'body' => $request->body,
                'image' => $imageName,
            ]);
        }

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect(route('blog.show', $id));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
    }
}
