<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Institute;
use App\Grade;
use App\User;
use App\Role;
use Session;
use Hash;
use Laratrust;

class GradeController extends Controller
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
        $grades = Grade::paginate(10);
        return view('grades.index')->withGrades($grades);
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
        return view('grades.create')
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

      $grade = new Grade();
      $grade->name = $request->name;
      $grade->save();

      return redirect()->route('grades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade = Grade::findOrFail($id);
        return view('grades.show')->withGrade($grade);
    }

    public function getGrade($user_id)
    {
        $grade = Grade::where('user_id', $user_id)->first();
        return view('grades.show')->withGrade($grade);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::findOrFail($id);
        $users = User::all();
        $packages = array(
            'bronze' => 'Bronze - 15 Teachers Limit',
            'silver' => 'Silver - 25 Teachers Limit',
            'gold' => 'Gold - 35 Teachers Limit',
            'platinum' => 'Platinum - Unlimited Teachers'
        );
        return view('grades.edit')
            ->withUsers($users)
            ->withPackages($packages)
            ->withGrade($grade);
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

      $grade = Grade::findOrFail($id);
      $grade->name = $request->name;
      $grade->save();

      return redirect()->route('grades.index');
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
