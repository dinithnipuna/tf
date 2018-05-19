@extends('layouts.admin')

@section('page_header')
  <h1> Grades <small>Add New Grade</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/admin/grades"><i class="fa fa-users"></i> Grades</a></li>
    <li class="active">Add New Grade</li>
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
                    <form role="form" action="{{route('grades.store')}}" method="POST">
                      {{csrf_field()}}      
                        <div class="form-group">
                            <label for="name">Grade Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                        </div>

                        <button type="submit" class="btn btn-primary">Create New Grade</button>
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
    </div>
</div>
@endsection