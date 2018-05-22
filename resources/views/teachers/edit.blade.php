@extends('layouts.admin')

@section('page_header')
  <h1> Teachers <small>Edit Teacher</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/admin/users"><i class="fa fa-users"></i> Teachers</a></li>
    <li class="active">Edit Teacher</li>
  </ol>
@endsection

@section('content')
  	<div class="row">
      <div class="col">
            <div class="panel panel-default">
                <div class="panel-body"> 
                  <div class="collapse in">
                    <!-- form start -->
                    <form role="form" action="{{route('teachers.update', $user->id)}}" method="POST">
                      {{csrf_field()}}   
                      {{method_field('PUT')}}   

                       <div class="form-group">
                          <label for="role">Role</label>
                          <select class="form-control" id="role" name="role">
                            @foreach ($roles as $role)
                              <option value="{{$role->id}}" {{ ( $role->id == $user->hasRole($role->name)) ? 'selected' : '' }}>{{$role->display_name}}</option>
                            @endforeach
                          </select>
                        </div> 

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label>
                                <input class="checkbox-slider yesno" type="checkbox" name="password_change">
                                <span class="text">Change Password</span>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes to Teacher</button>
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
    </div>
@endsection