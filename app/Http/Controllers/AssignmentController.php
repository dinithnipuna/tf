<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Assignment;
use App\Cls;
use Auth;
use App\Notifications\NewAssignment;
use Notification;
use Session;

class AssignmentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Auth::user()->assignments()->paginate(10);
        return view('assignments.index')->with('assignments', $assignments);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assignments.create');
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
            'title' => 'required|max:200',
            'body' => 'required',
            'class_id' => 'required',
        ]);

        $assignment = Auth::user()->assignments()->create([
                'title'=> $request->input('title'),
                'body'=> $request->input('body'),
                'class_id'=> $request->input('class_id'),
        ]);

        $cls = Cls::find($request->class_id);

        Notification::send($cls->students, new NewAssignment($assignment,$cls));

        Session::flash('success','The Assignment was successfully created!');

        return redirect()->route('assignments.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = Assignment::find($id);
        return view('assignments.edit')->with('assignment', $assignment);
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
            'title' => 'required|max:200',
            'body' => 'required',
            'class_id' => 'required',
        ]);


        $assignment = Assignment::find($id);

        $assignment->update([
            'title'=> $request->input('title'),
            'body'=> $request->input('body'),
            'class_id'=> $request->input('class_id'),
        ]);

        Session::flash('success','The Assignment was successfully updated!');

        return redirect()->route('assignments.index');
    }

    public function show($id)
    {
        $assignment = Assignment::find($id);
        return view('assignments.show')->with('assignment', $assignment);
    }
}
