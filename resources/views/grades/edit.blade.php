@extends('layouts.admin')

@section('page_header')
  <h1> Institutes <small>Edit Institute</small> </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/admin/institutes"><i class="fa fa-users"></i> Institutes</a></li>
    <li class="active">Edit Institute</li>
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
                    <form role="form" action="{{route('institutes.update', $institute->id)}}" method="POST">
                      {{csrf_field()}}   
                      {{ method_field('PUT') }}      
                        <div class="form-group">
                            <label for="name">Institute Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $institute->name }}" id="name">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ $institute->address }}" id="address">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="province">Province</label>
                             <select class="form-control" id="province" name="province">
                                <option value="province" disabled selected>Province</option>
                                <option value="Northern">Northern</option>
                                <option value="North Western">North Western</option>
                                <option value="Western">Western</option>
                                <option value="North Central">North Central</option>
                                <option value="Central">Central</option>
                                <option value="Sabaragamuwa">Sabaragamuwa</option>
                                <option value="Eastern">Eastern</option>
                                <option value="Uva">Uva</option>
                                <option value="Southern">Southern</option>
                              </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="district">District</label>
                             <select class="form-control" id="district" name="district">
                              <option value="district" disabled selected>District</option>
                              <option value="Jaffna">Jaffna</option>
                              <option value="Kilinochchi">Kilinochchi</option>
                              <option value="Mannar">Mannar</option>
                              <option value="Mullaitivu">Mullaitivu</option>
                              <option value="Vavuniya">Vavuniya</option>
                              <option value="Puttalam">Puttalam</option>
                              <option value="Kurunegala">Kurunegala</option>
                              <option value="Gampaha">Gampaha</option>
                              <option value="Colombo">Colombo</option>
                              <option value="Kalutara">Kalutara</option>
                              <option value="Anuradhapura">Anuradhapura</option>
                              <option value="Polonnaruwa">Polonnaruwa</option>
                              <option value="Matale">Matale</option>
                              <option value="Kandy">Kandy</option>
                              <option value="Nuwara Eliya">Nuwara Eliya</option>
                              <option value="Kegalle">Kegalle</option>
                              <option value="Ratnapura">Ratnapura</option>
                              <option value="Trincomalee">Trincomalee</option>
                              <option value="Batticaloa">Batticaloa</option>
                              <option value="Ampara">Ampara</option>
                              <option value="Badulla">Badulla</option>
                              <option value="Monaragala">Monaragala</option>
                              <option value="Hambantota">Hambantota</option>
                              <option value="Matara">Matara</option>
                              <option value="Galle">Galle</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="town">Town</label>
                            <input type="text" class="form-control" name="town" value="{{ $institute->town }}" id="town">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $institute->email }}">
                        </div>

                         <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $institute->phone }}">
                        </div>

                         <div class="form-group">
                          <label for="user_id">Institute Manager</label>
                          <select class="form-control" id="user_id" name="user_id">
                            @foreach ($users as $user)
                              <option value="{{$user->id}}"  {{ (  $institute->user_id == $user->id) ? 'selected' : '' }}>{{$user->name}}</option>
                            @endforeach
                          </select>
                        </div> 

                        <div class="form-group">
                            <label for="package">Package</label>
                            <select class="form-control" id="package" name="package">
                              @foreach ($packages as $key => $value)
                              <option value="{{ $key }}" {{ (  $institute->package == $key) ? 'selected' : '' }}>{{ $value }}</option>
                              @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes to Institute</button>
                           
                    </form>   
                  </div>
              </div>
          </div><!-- /.box -->
      </div>
    </div>
</div>
@endsection