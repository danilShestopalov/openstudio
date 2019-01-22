<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Startup;
use Illuminate\Http\Request;

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
        $startup = new Startup();

        $this->validate($request,[
            'title'=>'required',
            'info'=>'required',
            'urls'=>'',
            'startup_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('startup_image')) {
            $imageName = time().'.'.$request->startup_image->getClientOriginalExtension();
            $request->startup_image->move(public_path('uploads/startup/'), $imageName);
        }

        $startup->saveStartup($request, $imageName);

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
//dd($startup);
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
            'startup_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        if ($request->hasFile('startup_image')) {
            $imageName = time().'.'.$request->startup_image->getClientOriginalExtension();
            $request->startup_image->move(public_path('uploads/startup/'), $imageName);
        }

        $startup->updateStartup($request, $imageName);
//        return response()->json($request, 200);
        return redirect('/startup');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Startup $startup)
    {
        $startup->delete();
//        return response()->json($startup, 204);
        return redirect('/startup');
    }

    public function like(Startup $startup)
    {
        $startup->profiles()->attach(Auth::id());
        return redirect('/startup/'.$startup->id);
    }

}

