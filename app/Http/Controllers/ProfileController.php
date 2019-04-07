<?php

namespace App\Http\Controllers;

use App\Models\ProfileProfession;
use App\Models\ProfileSkill;
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
//        $this->validate($request,[
//            'nickname'=> 'required|unique:profiles,nickname',
//            'about'=>'required',
//            'contacts' => 'required',
//            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//            'background' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//
//        ]);

        if ($request->hasFile('avatar')) {
            $avatar = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('uploads/profile/avatar'), $avatar);
        }

        if ($request->hasFile('background')) {
            $background = time().'.'.$request->background->getClientOriginalExtension();
            $request->background->move(public_path('uploads/profile/background/'), $background);
        }

        $profile = Profile::create([
            'nickname' => $request->nickname,
            'contacts' => $request->contacts,
            'about' => $request->about,
            'avatar' => $avatar,
            'background' => $background,
            'user_id' => Auth::id(),
        ]);
        dd($profile);
        foreach ($request->skills as $skill)
        {
            $profile->skills()->attach($skill);
        }

        foreach ($request->professions as $profession)
        {
            $profile->professions()->attach($profession);
        }
dd($profile->skills);
        return redirect(route('profile.show', $profile->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $profile = Auth::user()->profile;
        $startups = Startup::where('creater_id', Auth::id())->get();
        return view('profile.show', compact('profile', 'startups'));
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

    public function skills()
    {
        return response()->json(ProfileSkill::all(), 200);
    }

    public function professions()
    {
        return response()->json(ProfileProfession::all(), 200);
    }
}
