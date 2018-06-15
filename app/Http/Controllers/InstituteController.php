<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use App\Province;
use App\District;
use Session;
use Hash;
use Auth;
use Laratrust;
use Illuminate\Support\Str;
use Mail;

class InstituteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::where('name','manager')->first();
        $users = $role->users()->paginate(10);
        return view('institutes.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = array(
            'bronze' => 'Bronze - 15 Teachers Limit',
            'silver' => 'Silver - 25 Teachers Limit',
            'gold' => 'Gold - 35 Teachers Limit',
            'platinum' => 'Platinum - Unlimited Teachers'
        );
        $provinces = Province::all();
        $districts = District::all();
        return view('institutes.create')
                    ->withProvinces($provinces)
                    ->withDistricts($districts)
                    ->withPackages($packages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([
            'name' => 'required|max:100',
            'address' => 'required|max:255',
            'province_id' => 'required',
            'district_id' => 'required',
            'town' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'package' => 'required'
        ]);

        $password = $request->password;

        $request->merge(['password' => Hash::make($password)]);

        $user = new User();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->province_id = $request->province_id;
        $user->district_id = $request->district_id;
        $user->town = $request->town;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->package = $request->package;
        $user->verifyToken = Str::random(40);
        $user->save();

        $role = Role::where('name','manager')->first();

        $user->attachRole($role, $password);

        $this->sendEmail($user);

        return redirect()->route('institutes.index');
    }

    public function sendEmail($user, $password)
    {
        Mail::send('mail.verifyEmail', ['user' => $user,'password'=>$password], function ($m) use ($user) {
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
       
    }

    public function getInstitute($user_id)
    {
        $user = Institute::where('user_id', $user_id)->first();
        return view('institutes.show')->withInstitute($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $packages = array(
            'bronze' => 'Bronze - 15 Teachers Limit',
            'silver' => 'Silver - 25 Teachers Limit',
            'gold' => 'Gold - 35 Teachers Limit',
            'platinum' => 'Platinum - Unlimited Teachers'
        );
        $provinces = Province::all();
        $districts = District::all();
        return view('institutes.edit')
            ->withUser($user)
            ->withProvinces($provinces)
            ->withDistricts($districts)
            ->withPackages($packages);

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
        'name' => 'required|max:100',
        'address' => 'required|max:255',
        'province_id' => 'required',
        'district_id' => 'required',
        'town' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'package' => 'required'
      ]);

      $request->merge(['password' => Hash::make($request->password)]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->address = $request->address;
      $user->province_id = $request->province_id;
      $user->district_id = $request->district_id;
      $user->town = $request->town;
      $user->email = $request->email;
      $user->password = $request->password;
      $user->phone = $request->phone;
      $user->package = $request->package;
      $user->save();

      return redirect()->route('institutes.index');
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
