@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
      <div class="row">
      <h4><i class="fa fa-user m-r-10"></i> Profile</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/notebooks"><i class="fa fa-user"></i> Profile</a></li>
          <li class="active">Classes</li>
        </ol>
        <div class="col">
          <div class="widget">
                  
                  <div class="table-responsive">
            <table class="table user-list">
              <thead>
                <tr>
                  <th><span>Class</span></th>
                  <th><span>Teacher</span></th>
                  <th><span>No of Students</span></th>
                  <th><span>Created</span></th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
             @foreach($classes as $class)
                  <tr>
                  <td>{{ $class->name }}</td>
                  <td>{{ $class->user->name }}</td>
                  <td>{{ $class->students()->count() }}</td>
                  <td>{{ $class->created_at }}</td>
                  <td style="width: 20%;">
                    <a href="{{route('classes.show', $class->id)}}" class="table-link success">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>
            </div>
            </div>
        </div>
      </div>
@endsection