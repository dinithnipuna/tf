<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Cls;
use App\Topic;
use Auth;

class TopicController extends Controller
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
        $topicbooks = Auth::user()->notebooks()->paginate(10);
        return view('notebooks.index')->with('notebooks', $topicbooks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topics.create');
    }

     public function createTopic($forumId)
    {
        return view('topics.create')->with('forum_id',$forumId);
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
        	'description' => 'required',
        ]);

        $forum = Cls::findOrFail($request->forum_id);

        $forum->topics()->create([
            'user_id' => Auth::user()->id,
            'name'=> $request->input('name'),
            'description'=> $request->input('description'),
        ]);

        return redirect()->route('forums.show',$forum->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('topics.edit')->with('note', $topic);
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
        	'description' => 'required',
        ]);

        $topic = Topic::findOrFail($id);

        $topic->update([
        	'name'=> $request->input('name'),
            'description'=> $request->input('description'),
        ]);

        return redirect()->route('notebooks.show',$topic->notebook->id);
    }

    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        $posts = $topic->posts()->orderBy('created_at','desc')->paginate(10);
        return view('topics.show')->with('topic', $topic)->with('posts',$posts);
    }

    public function showTopicPost($id)
    {
        $post = Post::findOrFail($id);
        return view('topics.post')->with('post',$post);
    }
}
