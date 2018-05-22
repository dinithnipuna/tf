@extends('layouts.admin')

@section('page_header')
  <h1> Institutes <small>Add New Institute</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/institutes"><i class="fa fa-users"></i> Institutes</a></li>
    <li class="active">Add New Institute</li>
  </ol>
@endsection

@section('content')
  	<div class="row">
      <div class="col">
          <div class="panel panel-default">
                <div class="panel-body"> 
                  <div class="collapse in">
                    <!-- form start -->
                    <form role="form" action="{{route('institutes.store')}}" method="POST">
                      {{csrf_field()}}      
                        <div class="form-group">
                            <label for="name">Institute Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" value="{{old('address')}}" id="address">
                        </div>

                        <div class="form-group col-md-4">
                          <label for="province_id">Province</label>
                          <select class="form-control" id="province_id" name="province_id">
                            @foreach ($provinces as $province)
                              <option value="{{$province->id}}">{{$province->name}}</option>
                            @endforeach
                          </select>
                        </div> 

                        <div class="form-group col-md-4">
                          <label for="district_id">Province</label>
                          <select class="form-control" id="district_id" name="district_id">
                            @foreach ($districts as $district)
                              <option value="{{$district->id}}">{{$district->name}}</option>
                            @endforeach
                          </select>
                        </div>    

                        <div class="form-group col-md-4">
                            <label for="town">Town</label>
                            <input type="text" class="form-control" name="town" value="{{old('town')}}" id="town">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>

                        <div class="form-group">
                            <label for="email">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>

                         <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>

                        <div class="form-group">
                            <label for="package">Package</label>
                            <select class="form-control" id="package" name="package">
                              @foreach ($packages as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create New Institute</button>
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
    </div>
@endsection