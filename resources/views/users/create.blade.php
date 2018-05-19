@extends('layouts.admin')

@section('page_header')
  <h1> Users <small>Add New User</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/admin/users"><i class="fa fa-users"></i> Users</a></li>
    <li class="active">Add New User</li>
  </ol>
@endsection

@section('content')
 <div class="container-fluid">
  	<div class="row">
      <div class="col">
           <div class="panel panel-default">
                <div class="panel-body"> 
                  <div class="collapse in">
                    <!-- form start -->
                    <form role="form" action="{{route('users.store')}}" method="POST">
                      {{csrf_field()}}      
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Create New User</button>
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
    </div>
</div>
@endsection