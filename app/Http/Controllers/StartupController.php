<?php

namespace App\Http\Controllers;


use App\Mail\Welcome;
use App\Models\StartupComment;
use App\Models\StartupFile;
use Illuminate\Support\Facades\Auth;
use App\Startup;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class StartupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('startup.index');
    }


    public function create()
    {
        return view('startup.create');
    }

    public function myStartups()
    {
        return view('startup.my_startups');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
            'info' => 'required|max:400',
            'tagline' => 'required|max:50',
            'logo' => 'required|image'

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
            'creater_id' => Auth::id(),
            'logo' => $logo,
        ]);

        $startup->users()->attach(Auth::id());

//        foreach ($request->skills as $skill)
//        {
//            $startup->professions()->attach($skill);
//        }

        return redirect(route('startup.show', $startup->id));
    }


    public function show($id)
    {
        $startup = Startup::find($id);

        $user_in_startup = false;
        foreach($startup->users as $user){
            if($user['id'] == Auth::id()){
                $user_in_startup = true;
                break;
            }
        }


        $comments = $startup->comments;
        return view('startup.show', compact('startup', 'comments', 'user_in_startup'));
    }


    public function like($id)
    {
        $startup = Startup::find($id);

        if(Auth::user()) {
            if ($startup->users != null) {
                foreach ($startup->users as $user) {
                    if (Auth::id() == $user->id) {
                        return redirect()->back();
                    }
                }
                if($startup->creater->status)
                $to_email = $startup->creater->email;
                $to_name = 'Стартапер';
                $data = array('nickname' => Auth::user()->profile->nickname, 'email' => Auth::user()->email, 'id' => Auth::user()->profile->id);

                Mail::send('emails.join_startup', $data, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                        ->subject('Вашим стартапом заинтересовались');
                    $message->from('openstudio.kz@gmail.com','Openstudio');
                });

                $startup->users()->attach(Auth::id());
                $startup->likes = $startup->likes + 1;
                $startup->save();

            }
            return redirect()->back();
        } else {
            return redirect(route('profile.create'));
        }
    }

    public function favoriteStartups()
    {
        return response()->json(Auth::user()->favoriteStartups, 201);
    }

    public function topStartups()
    {
        return response()->json(Startup::all(), 201);
    }


    public function storeComment(Request $request, $id)
    {
        if(Auth::user()->profile == null){
            return redirect(route('profile.create'));
        }
        $this->validate($request,[
            'body' => 'required'
        ]);

        StartupComment::create([
            'body' => $request->body,
            'creator_id' => Auth::id(),
            'startup_id' => $id
        ]);

        return redirect()->back();
    }
    public function getMyStartups()
    {
        return Auth::user()->myStartups;
    }
    public function userStatus()
    {
        if(Auth::check())
        {
            return 1;
        }
        return 0;
    }
}

