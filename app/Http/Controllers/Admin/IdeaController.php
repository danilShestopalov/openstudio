<?php

namespace App\Http\Controllers\Admin;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::all();

        return view('admin.idea.index', compact('ideas'));
    }

    public function edit($id)
    {
        $idea = Idea::find($id);
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
            $request->image->move(public_path('/uploads/ideas/'), $imageName);
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

    public function approve($id)
    {
        $idea = Idea::find($id);
        if($idea->status == 1){
            $idea->status = 0;
        } else {
            $idea->status = 1;
        }
        $idea->save();
        return redirect()->back();
    }
}
