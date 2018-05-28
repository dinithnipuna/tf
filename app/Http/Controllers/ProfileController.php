<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cls;
use App\Province;
use App\District;
use App\Post;
use Response;
use Auth;
use Image;
use Storage;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProfile($id)
    {
        $user = User::find($id);

        if(!$user){
            abort(404);
        }

        $posts = $user->posts()->orderBy('created_at','desc')->get();
        $requests = $user->friendRequests();

        if($user->hasRole('teacher')){
           // $classes = Cls::where('user_id',$user->id)->get();
            $classes = $user->clses()->get();

            return view('teachers.show')
                    ->with('user', $user)
                    ->with('classes', $classes)
                    ->with('requests', $requests)
                    ->with('posts',$posts);
        }else if($user->hasRole('manager')){
            return view('institutes.show')
                    ->with('user', $user)
                    ->with('posts',$posts)
                    ->with('requests', $requests);
        }else{
            return view('students.show')->with('user',$user)->with('posts',$posts);
        }
        
    }

    public function getEdit()
    {
        $provinces = Province::all();
        $districts = District::all();
        return view('profile.edit')
                    ->withProvinces($provinces)
                    ->withDistricts($districts);
    }

    public function postEdit(Request $request)
    {
      $this->validateWith([
        'name' => 'required|max:100',
        'address' => 'required|max:255',
        'province_id' => 'required',
        'district_id' => 'required',
        'town' => 'required',
        'phone' => 'required',
      ]);


      $user = Auth::user();
      $user->name = $request->name;
      $user->address = $request->address;
      $user->province_id = $request->province_id;
      $user->district_id = $request->district_id;
      $user->town = $request->town;
      $user->phone = $request->phone;

      if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $fileName = time().'.'.$avatar->getClientOriginalExtension();
            $location = public_path('images/users/').$fileName;
            Image::make($avatar)->fit(200, 200)->save($location);
            $oldAvatar = $user->avatar; 
            $user->avatar = $fileName;
            if($oldAvatar != null){
                Storage::delete('users/'.$oldAvatar);
            }
      }

      if($request->hasFile('cover')){
            $cover = $request->file('cover');
            $fileName = time().'.'.$cover->getClientOriginalExtension();
            $location = public_path('images/covers/').$fileName;
            Image::make($cover)->fit(800, 300)->save($location);
            $oldCover = $user->cover; 
            $user->cover = $fileName;
            if($oldCover != null){
                Storage::delete('covers/'.$oldCover);
            }
      }

      $user->save();

      return redirect()->route('profile',$user->id);
    }

    public function join($userId)
    {
        $user = User::find($userId);

        if(!$user){
            return redirect()->route('home');
        }

        Auth::user()->addFriend($user);

        return redirect()->back();
    }

    public function accept($userId)
    {
        $user = User::find($userId);

        if(!$user){
            return redirect()->route('home');
        }

        if(!Auth::user()->hasFriendRequestsReceived($user)){
            return redirect()->route('home');
        }

        Auth::user()->acceptFriendRequests($user);

        return redirect()->back();
    }

    public function leave($userId)
    {
        $user = User::find($userId);

        if(!$user){
            return redirect()->route('home');
        }

        if(!Auth::user()->isFriendWith($user)){
            return redirect()->route('home');
        }

        Auth::user()->deleteFriend($user);

        return redirect()->back();
    }


    public function joinClass($classId)
    {
        $class = Cls::find($classId);

        if(!$class){
            return redirect()->route('home');
        }

        Auth::user()->addClass($class);

        return redirect()->back();
    }

     public function leaveClass($classId)
    {
        $class = Cls::find($classId);

        if(!$class){
            return redirect()->route('home');
        }

        Auth::user()->deleteClass($class);

        return redirect()->back();
    }

    public function getClasses()
    {
        if(Auth::user()->hasRole('student')){
            $classes = Auth::user()->classes()->paginate(10);
        }else{
            $classes = Auth::user()->clses()->paginate(10);
        }    
        return view('profile.classes')->withClasses($classes);
    }

    public function getAssignments()
    {
        if(Auth::user()->hasRole('student')){
            $classes = Auth::user()->classes()->paginate(10);
        }else{
            $classes = Auth::user()->clses()->paginate(10);
        }    
        return view('profile.assignments')
                    ->withClasses($classes);
    }

    public function getMessages()
    {
        dd(Auth::user()->messages);
        return view('profile.messages');
    }
}
