<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notebook;
use App\Note;
use Auth;

class NoteController extends Controller
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
        $notebooks = Auth::user()->notebooks()->paginate(10);
        return view('notebooks.index')->with('notebooks', $notebooks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

     public function createNote($notebookId)
    {
        return view('notes.create')->with('notebook',$notebookId);
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
        	'title' => 'required|max:100',
        	'body' => 'required',
        ]);

        $notebook = Notebook::findOrFail($request->notebook);

        $notebook->notes()->create([
            'title'=> $request->input('title'),
            'body'=> $request->input('body'),
        ]);

        return redirect()->route('notebooks.show',$notebook->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('notes.edit')->with('note', $note);
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
        	'title' => 'required|max:100',
        	'body' => 'required',
        ]);

        $note = Note::findOrFail($id);

        $note->update([
        	'title'=> $request->input('title'),
            'body'=> $request->input('body'),
        ]);

        return redirect()->route('notebooks.show',$note->notebook->id);
    }

    public function show($id)
    {
        $note = Note::findOrFail($id);
        return view('notes.show')->with('note', $note);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Note::find($id)->delete();
    }
}
