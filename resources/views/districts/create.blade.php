@extends('layouts.admin')

@section('page_header')
  <h1> Districts <small>Add New District</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/districts"><i class="fa fa-users"></i> Districts</a></li>
    <li class="active">Add New District</li>
  </ol>
@endsection

@section('content')
  	<div class="row">
      <div class="col">
          <div class="panel panel-default">
                <div class="panel-body"> 
                  <div class="collapse in">
                    <!-- form start -->
                    <form role="form" action="{{route('districts.store')}}" method="POST">
                      {{csrf_field()}}  
                        <div class="form-group">
                          <label for="province_id">Province</label>
                          <select class="form-control" id="province_id" name="province_id">
                            @foreach ($provinces as $province)
                              <option value="{{$province->id}}">{{$province->name}}</option>
                            @endforeach
                          </select>
                        </div>   
                        <div class="form-group">
                            <label for="name">District Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                        </div>

                        <button type="submit" class="btn btn-primary">Create New District</button>
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
@endsection