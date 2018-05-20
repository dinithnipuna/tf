@extends('layouts.admin')

@section('page_header')
  <h1> Provinces <small>Edit Province</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/provinces"><i class="fa fa-users"></i> Provinces</a></li>
    <li class="active">Edit Province</li>
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
                    <form role="form" action="{{route('provinces.update', $province->id)}}" method="POST">
                      {{csrf_field()}}   
                      {{ method_field('PUT') }}      
                        <div class="form-group">
                            <label for="name">Province Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $province->name }}" id="name">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes to Province</button>
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
    </div>
</div>
@endsection