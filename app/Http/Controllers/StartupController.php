<?php

namespace App\Http\Controllers;


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

    public function apiStartups()
    {
        $startups = Startup::all();
        return response()->json($startups, 201);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('startup.create');
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
            'title'=>'required',
            'info'=>'required',
            'urls'=>'',
        ]);

        $startup = Startup::create([
            'title' => $request->title,
            'info' => $request->info,
            'urls' => $request->urls,
            'creater_id' => Auth::id(),
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Startup $startup)
    {
        return view('startup.show', compact('startup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Startup $startup)
    {
        return view('startup.edit', compact('startup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
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



}

