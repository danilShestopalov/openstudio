<?php

namespace App\Http\Controllers;


use App\Models\StartupComment;
use App\Models\StartupFile;
use Illuminate\Support\Facades\Auth;
use App\Startup;
use Illuminate\Http\Request;
use App\Models\User;

class StartupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startups = Startup::all();
//        return response()->json($startups, 201);
        return view('startup.index', compact('startups'));
    }

    public function topStartups()
    {
        $startups = Startup::latest()->get();


        return response()->json($startups, 201);

    }

    public function create()
    {
        return view('startup.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'info' => 'required',
            'tagline' => 'required',
            'link' => 'required',
        ]);

        $logo = '';
        if ($request->hasFile('logo')) {
            $logo = time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads/startup/logo'), $logo);
        }

        $startup = Startup::create([
            'title' => $request->title,
            'info' => $request->info,
            'tagline' => $request->tagline,
            'link' => $request->link,
            'creater_id' => Auth::id(),
            'logo' => $logo,
        ]);


        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                $name = time().'_'.$f->getClientOriginalName();
                StartupFile::create([
                    'name' => $name,
                    'startup_id' => $startup->id,
                ]);
                $f->move(storage_path('images'), $name);
            }
        }

//        return response()->json($profile, 201);
        return redirect('/startup')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }


    public function show(Startup $startup)
    {
//        dd($startup->comments);
        $comments = $startup->comments;
        return view('startup.show', compact('startup', 'comments'));
    }


    public function edit(Startup $startup)
    {
        return view('startup.edit', compact('startup'));
    }


    public function update(Request $request, Startup $startup)
    {
        $this->validate($request,[
            'title'=>'required',
            'info'=>'required',

        ]);


        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                $f->move(storage_path('images'), time().'_'.$f->getClientOriginalName());
            }
        }
//
//        $startup->updateStartup($request, $imageName);
//        return response()->json($request, 200);
        return redirect('/startup');
    }

    public function destroy(Startup $startup)
    {
        $startup->delete();
//        return response()->json($startup, 204);
        return redirect('/startup');
    }

    public function like(Request $request, $id)
    {
        $startup = Startup::find($id);

        if($startup->users != null) {
            foreach ($startup->users as $profile) {
                if (Auth::id() == $profile->id) {
                    $startup->users()->detach(Auth::id());
                    $startup->likes = $startup->likes-1;
                    $startup->save();
                    return $startup->likes;

                }

            }

            $startup->users()->attach(Auth::id());
            $startup->likes = $startup->likes+1;
            $startup->save();
        }

        return $startup->likes;
    }

    public function storeComment(Request $request, $id)
    {
        $this->validate($request,[
            'body' => 'required|max:155'
        ]);

        $startup = StartupComment::create([
            'body' => $request->body,
            'creator_id' => Auth::id(),
            'startup_id' => $id
        ]);

        return redirect()->back();
    }
}

