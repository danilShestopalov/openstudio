<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\ITag;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::where('status', 1)->get();
        return view('idea.index', compact('ideas'));
    }

    public function indexApi()
    {
        $ideas = Idea::where('status', 1)->get();

        for($i = 0; $i < count($ideas); $i++){
            $ideas[$i]['likes'] = count($ideas[$i]->users);
            $ideas[$i]['tags'] = $ideas[$i]->tags;
        }

        return response()->json($ideas,200);

    }

    public function create()
    {
        $tags = ITag::all();
        return view('idea.create', compact('tags'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required|max:10',
            'body' => 'required|max:500',
            'image' => 'required',
        ]);

        $imageName = '';

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/uploads/ideas/'), $imageName);
        }


        $idea = new Idea;
        $idea->title = $request->title;
        $idea->body = $request->body;
        $idea->creator_id = Auth::id();
        $idea->image = $imageName;
        $idea->save();
        $idea->tags()->attach($request->tags);

        return redirect(route('idea.show', $idea->id));
    }

    public function show($id)
    {
        $idea = Idea::find($id);
        $comments = $idea->comments;

        return view('idea.show', compact('idea', 'comments'));
    }

    public function edit($id)
    {
        $idea = Post::find($id);
        return view('idea.edit', compact('idea'));
    }

    public function update(Request $request, $id)
    {
        $idea = Idea::find($id);

        $this->validate($request,[
            'title' => 'required|max:30',
            'body' => 'required|max:1000',
        ]);

        $imageName = '';

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/uploads/posts/'), $imageName);
            $idea->update([
                'title' => $request->title,
                'body' => $request->body,
                'image' => $imageName,
            ]);
        }

        $idea->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);
        return redirect(route('idea.show', $id));
    }

    public function destroy($id)
    {
        $idea = Idea::find($id);
        $idea->delete();
        return redirect('/idea');
    }

    public function like(Request $request)
    {
        $idea = Idea::find($request->id);
        foreach($idea->users as $profile)
        {
            if(Auth::id() == $profile->id){
                $idea->users()->detach(Auth::id());
                return ['likes' => count($idea->users)];

            }

        }
        $idea->users()->attach(Auth::id());

//        dd( $idea->users);
        return ['likes' => count($idea->users)];
    }
}
