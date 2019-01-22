<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Startup;
use Illuminate\Http\Request;
use App\Jobs\ProcessImageThumbnails;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $profiles = Profile::all();
//        return response()->json($profiles, 201);
        return view('profile.index', compact('profiles'));
    }

    public function apiProfiles()
    {
        $profiles = Profile::all();
        return response()->json($profiles, 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $profile = new Profile();

        $this->validate($request,[
            'firstname'=> 'required',
            'lastname'=>'required',
            'info'=>'required',
            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'urls' => ''
        ]);
//        dd($request);

//        $request += ['user_id' => Auth::id()];

        if ($request->hasFile('user_image')) {
            $imageName = time().'.'.$request->user_image->getClientOriginalExtension();
            $request->user_image->move(public_path('uploads/profile/'), $imageName);
        }

        $profile->saveProfile($request, $imageName);
//        return response()->json($profile, 201);
        return redirect('/profile')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {

        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $this->validate($request,[
            'firstname'=> 'required',
            'lastname'=>'required',
            'info'=>'required',
//            'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('user_image')) {
            $imageName = time().'.'.$request->user_image->getClientOriginalExtension();
            $request->user_image->move(public_path('uploads/profile/'), $imageName);
        }

        $profile->updateProfile($request);

//        return response()->json($request, 200);
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json($profile, 204);
//        return redirect('/profile');
    }

}
