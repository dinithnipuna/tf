<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Role;
use Session;
use Hash;
use Auth;
use Laratrust;

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
        return view('institutes.create')
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
        'email' => 'required',
        ]);

        $request->merge(['password' => Hash::make($request->password)]);

        $user = User::create($request->all());

        $role = Role::where('name','manager')->first();

        $user->attachRole($role);

        return redirect()->route('institutes.index');
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
        $institute = Institute::where('user_id', $user_id)->first();
        return view('institutes.show')->withInstitute($institute);
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
        return view('institutes.edit')
            ->withUser($user)
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
        'province' => 'required',
        'district' => 'required',
        'town' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'user_id' => 'required',
        'package' => 'required'
      ]);

      $institute = Institute::findOrFail($id);
      $institute->name = $request->name;
      $institute->address = $request->address;
      $institute->province = $request->province;
      $institute->district = $request->district;
      $institute->town = $request->town;
      $institute->email = $request->email;
      $institute->phone = $request->phone;
      $institute->package = $request->package;
      $institute->save();

      $institute->users()->attach($request->user_id);

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

    public function join($id)
    {
        $institute = Institute::findOrFail($id);
        $user_id = Auth::user()->id;
        $student = Student::where('user_id',$user_id)->first();
        $institute->students()->attach($student->id);
        return redirect()->back();
    }

    public function leave($id)
    {
        $institute = Institute::findOrFail($id);
        $user_id = Auth::user()->id;
        $student = Student::where('user_id',$user_id)->first();
        $institute->students()->detach($student->id);
        return redirect()->back();
    }
}
