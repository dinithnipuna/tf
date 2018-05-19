<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('roles.index')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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
        'display_name' => 'required|max:255',
        'name' => 'required|max:100|alpha_dash|unique:roles',
        'description' => 'sometimes|max:255'
      ]);

      $role = new Role();
      $role->display_name = $request->display_name;
      $role->name = $request->name;
      $role->description = $request->description;
      $role->save();

      // if ($request->permissions) {
      //   $role->syncPermissions(explode(',', $request->permissions));
      // }
      // Session::flash('success', 'Successfully created the new '. $role->display_name . ' role in the database.');

      return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit')->withRole($role);
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
            'display_name' => 'required|max:255',
            'description' => 'sometimes|max:255'
        ]);

        $role = Role::findOrFail($id);
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();

        // if ($request->permissions) {
        //   $role->syncPermissions(explode(',', $request->permissions));
        // }

        // Session::flash('success', 'Successfully update the '. $role->display_name . ' role in the database.');

        return redirect()->route('admin.roles.index');
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
