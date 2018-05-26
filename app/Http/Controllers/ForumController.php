<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cls;
use Auth;

class ForumController extends Controller
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
        if(Auth::user()->hasRole('student')){
            $forums = Auth::user()->classes()->paginate(10);
        }else{
            $forums = Auth::user()->clses()->paginate(10);
        }    
        return view('forums.index')->with('forums', $forums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notebooks.create');
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
        ]);

        Auth::user()->notebooks()->create([
                'name'=> $request->input('name'),
        ]);

        return redirect()->route('notebooks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notebook = Notebook::findOrFail($id);
        return view('notebooks.edit')->with('notebook', $notebook);
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

        $notebook = Notebook::findOrFail($id);

        $notebook->update([
            'name'=> $request->input('name'),
        ]);

        return redirect()->route('notebooks.index');
    }

    public function show($id)
    {
        $forum = Cls::find($id);
        $topics = $forum->topics()->paginate(10);
        return view('forums.show')->with('forum', $forum)->with('topics', $topics);
    }
}
