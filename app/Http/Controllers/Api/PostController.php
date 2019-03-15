<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $posts = Post::all();
    return response()->json(['posts' => $posts], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    return view('post.create');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $this->validate($request,[
        'title' => 'required|max:30',
        'body' => 'required|max:1000',
        'image' => 'required',
    ]);

    $imageName = '';

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/uploads/posts/'), $imageName);
    }

    $post = new Post;
    $post->title = $request->title;
    $post->body = $request->body;
    $post->creator_id = Auth::id();
    $post->image = $imageName;

    $post->save();

    return redirect(route('blog.show', $post->id));
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
    $post = Post::find($id);
    $comments = $post->comments;
    return view('post.show', compact('post', 'comments'));
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
{
    $post = Post::find($id);
    return view('post.edit', compact('post'));
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $post = Post::find($id);

    $this->validate($request,[
        'title' => 'required|max:30',
        'body' => 'required|max:1000',
    ]);

    $file =$request->file['image'];
    if($file){

        $filename =$file->move('uploads/posts/', $file->getClientOriginalName());
    }

    $post->update([
        'title' => $request->title,
        'body' => $request->body,
        'image' => $filename,
    ]);
    return redirect(route('post.show', $id));
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $post = Post::find($id);
    $post->delete();
}
}

