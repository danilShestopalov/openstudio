<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\ProfileSkill;
use App\Profile;
use App\Startup;
use Illuminate\Http\Request;
use App\Jobs\ProcessImageThumbnails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
        return view('profile.index', compact('profiles'));
    }


     public function create()
    {
        if(Auth::user()->profile){
            return redirect(route('profile.show', Auth::user()->profile->id));
        } else {
            return view('profile.create');
        }
    }


    public function store(Request $request)
    {
        if(Auth::user()->profile){
            return redirect(route('profile.show', Auth::user()->profile->id));
        } else {
            $this->validate($request, [
                'nickname' => 'required|unique:profiles',
                'about' => 'required',
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'background' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('avatar')) {
                $avatar = time() . '.' . $request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('uploads/profile/avatar'), $avatar);
            }

            if ($request->hasFile('background')) {
                $background = time() . '.' . $request->background->getClientOriginalExtension();
                $request->background->move(public_path('uploads/profile/background/'), $background);
            }

            $profile = Profile::create([
                'nickname' => $request->nickname,
                'about' => $request->about,
                'avatar' => $avatar,
                'background' => $background,
                'user_id' => Auth::id(),
            ]);

            foreach ($request->skills as $skill) {
                $profile->skills()->attach($skill);
            }

//            foreach ($request->professions as $profession) {
//                $profile->professions()->attach($profession);
//            }

            return redirect(route('profile.show', $profile->id));
        }
    }


    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        if(!$profile){
            return redirect(route('profile.create'));
        }
        //$startups = Startup::where('creater_id', Auth::id())->get();
        return view('profile.show', compact('profile'));
    }



    public function skills()
    {
        return response()->json(ProfileSkill::all(), 200);
    }

    public function profileSkills($id)
    {
        return response()->json(Profile::find($id)->skills, 200);
    }

    public function showProfile($id)
    {

        $profile = Profile::findOrFail($id);
        $startups = Auth::user()->myStartups;

        return view('profile.show_profile', compact('profile', 'startups'));
    }


    public function like(Request $request, $id)
    {
        $user = Profile::find($id)->user;
        $startup = Startup::find($request->id)->first();
        $profile_len = count(Profile::all());

        if ($startup->users != null) {
            foreach ($startup->users as $profile) {
                if (Auth::id() == $profile->id) {
                    if($profile_len - $id = 0){
                        return redirect(route('startup.index'));
                    }
                    return redirect(route('profile.showProfile', $profile_len - $id + 1));
                }
            }
                $to_email = $user->email;
                $to_name = 'Юсер';
                $data = array('url' => 'http://openstudio.kz/startup/'.$request->id);

                Mail::send('emails.join_profile', $data, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                        ->subject('Вашим профилем заинтересовались');
                    $message->from('openstudio.kz@gmail.com','Openstudio');
                });

                $startup->users()->attach($user->id);

            }
            if($profile_len - $id < 0){
                return redirect(route('startup.index'));
            }
            return redirect(route('profile.showProfile', $profile_len - $id + 1));

    }
}
