@extends('layouts.admin')

@section('page_header')
  <h1> Roles <small>Edit Role</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/admin/roles"><i class="fa fa-users"></i> Roles</a></li>
    <li class="active">Edit Role</li>
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
                    <form role="form" action="{{route('admin.roles.update', $role->id)}}" method="POST">
                      {{csrf_field()}}   
                      {{ method_field('PUT') }}   
                        <div class="form-group">
                            <label for="name">Name (Human Readable)</label>
                            <input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}" id="display_name">
                        </div>

                        <div class="form-group">
                            <label for="name">Slug (Can not be changed)</label>
                            <input type="text" class="form-control" name="name" value="{{$role->name}}" id="name" disabled>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" value="{{$role->description}}" id="description">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes to Role</button>
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
    </div>
</div>
@endsection