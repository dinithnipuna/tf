<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Institute;
use App\Manager;
use App\Role;
use App\Teacher;
use Session;
use Hash;
use Laratrust;
use Auth;
use Illuminate\Support\Str;
use Mail;

class TeacherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Auth::user()->friends();
        $role = Role::where('name','=','teacher')->first();
        return view('teachers.index')
                    ->with('teachers',$teachers)
                    ->with('role',$role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('teachers.create')->with('roles',$roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = $request->password;

        $request->merge(['password' => Hash::make($request->password),'verifyToken' => Str::random(40)]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->verifyToken = Str::random(40);
        $user->save();

        $role = Role::where('name','=','teacher')->first();

        $user->attachRole($role);

        $this->sendEmail($user, $password);

        if(!Auth::user()->isFriendWith($user)){
            Auth::user()->addFriendAndAccept($user);
        }

        Session::flash('success','The Teacher was successfully created!');

        return redirect()->route('teachers.index');
    }


    public function sendEmail($user, $password)
    {
        Mail::send('mail.verifyEmail', ['user' => $user, 'password'=>$password], function ($m) use ($user) {
            $m->from('admin@tf.com', 'Teacher Finder');
            $m->to($user->email, $user->name)->subject('Email Verify');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('teachers.edit')->withUser($user)->withRoles($roles);
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
        $this->validateWith([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password_change == 'on') {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $user->syncRoles([$request->role]);

        if(!Auth::user()->isFriendWith($user)){
            Auth::user()->addFriendAndAccept($user);
        }
        
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
