@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
      <div class="row">
      <h4><i class="fa fa-user m-r-10"></i> Profile</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/notebooks"><i class="fa fa-user"></i> Profile</a></li>
          <li class="active">Edit Profile</li>
        </ol>
        <div class="col">
          <div class="widget">
             
              <!-- form start -->
                    <form role="form" action="{{route('profile.edit')}}" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}

                      <div class="col-md-8">

                        <div class="form-group">
                            @if( Auth::user()->hasRole('manager'))
                              <label for="name">Institute Name</label>
                            @else
                              <label for="name">Full Name</label>
                            @endif
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" id="name">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->address}}" id="address">
                        </div>

                        <div class="form-group col-md-4">
                          <label for="province_id">Province</label>
                          <select class="form-control" id="province_id" name="province_id">
                            @foreach ($provinces as $province)
                              <option value="{{$province->id}}" {{ Auth::user()->province_id == $province->id ? 'selected' : ''}}>{{$province->name}}</option>
                            @endforeach
                          </select>
                        </div>   

                        <div class="form-group col-md-4">
                          <label for="district_id">District</label>
                          <select class="form-control" id="district_id" name="district_id">
                            @foreach ($districts as $district)
                              <option value="{{$district->id}}" {{ Auth::user()->district_id == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                            @endforeach
                          </select>
                        </div>      

                        <div class="form-group col-md-4">
                            <label for="town">Town</label>
                            <input type="text" class="form-control" name="town" value="{{ Auth::user()->town}}" id="town">
                        </div>

                         <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>

                        </div>


                         <div class="col-md-4">
                              <div class="well">
                                <label for="avatar">Profile Picture</label>
                                    <center>
                                      <img class="profile-user-img img-responsive img-circle " src="{{ asset('images/users/'. Auth::user()->getAvatar())}}" alt="User profile picture" width="100">           
                                    </center>
                                  <hr/>
                                  <input type="file" name="avatar"/>
                              </div>

                              <div class="well">
                                <label for="cover">Profile Cover</label>
                                    <center>
                                      <img class="profile-user-img img-responsive" src="{{ asset('images/covers/'. Auth::user()->getCover())}}" alt="User profile picture" height="100">  
                                    </center>
                                  <hr/>
                                  <input type="file" name="cover"/>
                              </div>
                          </div> 
                    </form>   
            </div>
        </div>
      </div>
@endsection