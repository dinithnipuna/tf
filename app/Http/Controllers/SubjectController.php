<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Institute;
use App\Subject;
use App\User;
use App\Role;
use Session;
use Hash;
use Laratrust;

class SubjectController extends Controller
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
        $subjects = Subject::paginate(10);
        return view('subjects.index')->withSubjects($subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $packages = array(
            'bronze' => 'Bronze - 15 Teachers Limit',
            'silver' => 'Silver - 25 Teachers Limit',
            'gold' => 'Gold - 35 Teachers Limit',
            'platinum' => 'Platinum - Unlimited Teachers'
        );
        return view('subjects.create')
            ->withPackages($packages)
            ->with('users',$users);
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
        'name' => 'required|max:100'
      ]);

      $subject = new Subject();
      $subject->name = $request->name;
      $subject->save();

      return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.show')->withSubject($subject);
    }

    public function getSubject($user_id)
    {
        $subject = Subject::where('user_id', $user_id)->first();
        return view('subjects.show')->withSubject($subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        $users = User::all();
        $packages = array(
            'bronze' => 'Bronze - 15 Teachers Limit',
            'silver' => 'Silver - 25 Teachers Limit',
            'gold' => 'Gold - 35 Teachers Limit',
            'platinum' => 'Platinum - Unlimited Teachers'
        );
        return view('subjects.edit')
            ->withUsers($users)
            ->withPackages($packages)
            ->withSubject($subject);
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
      ]);

      $subject = Subject::findOrFail($id);
      $subject->name = $request->name;
      $subject->save();

      return redirect()->route('subjects.index');
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
