@extends('layouts.admin')

@section('page_header')
  <h1> Subjects <small>Add New Subject</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/admin/grades"><i class="fa fa-users"></i> Subjects</a></li>
    <li class="active">Add New Subject</li>
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
                    <form role="form" action="{{route('subjects.store')}}" method="POST">
                      {{csrf_field()}}      
                        <div class="form-group">
                            <label for="name">Subject Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                        </div>

                        <button type="submit" class="btn btn-primary">Create New Subject</button>
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
    </div>
</div>
@endsection