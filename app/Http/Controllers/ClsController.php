<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cls;
use App\Grade;
use App\Subject;
use App\User;
use App\Role;
use Session;
use Hash;
use Auth;
use Laratrust;

class ClsController extends Controller
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
        $classes = Cls::where('user_id',Auth::user()->id)->paginate(10);
        return view('classes.index')->withClasses($classes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all();
        $subjects = Subject::all();
        return view('classes.create')
            ->withGrades($grades)
            ->withSubjects($subjects);
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
        'grade_id' => 'required',
        'subject_id' => 'required',
        'type' => 'required'
      ]);

      $class = new Cls();
      $class->name = $request->name;
      $class->user_id = Auth::user()->id;
      $class->grade_id = $request->grade_id;
      $class->subject_id = $request->subject_id;
      $class->type = $request->type;
      $class->save();

      return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Cls::findOrFail($id);
        $posts = $class->posts()->orderBy('created_at','desc')->get();

        return view('classes.show')->with('class', $class)->with('posts', $posts);
    }

    public function getCls($user_id)
    {
        $classe = Cls::where('user_id', $user_id)->first();
        return view('classes.show')->with($classe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = Cls::findOrFail($id);
        $grades = Grade::all();
        $subjects = Subject::all();
        return view('classes.edit')
            ->withGrades($grades)
            ->withSubjects($subjects)
            ->withClass($class);
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
        'grade_id' => 'required',
        'subject_id' => 'required',
        'type' => 'required'
      ]);

      $class = Cls::findOrFail($id);
      $class->name = $request->name;
      $class->user_id = Auth::user()->id;
      $class->grade_id = $request->grade_id;
      $class->subject_id = $request->subject_id;
      $class->type = $request->type;
      $class->save();

      return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Cls::find($id);
        $class->delete();
    }
}
