@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
      <div class="row">
        <div class="col">
          <div class="widget">
             
              <div class="row">
                        <div class="col-md-6"><h4><i class="fa fa-book m-r-10"></i> Assignments</h4></div>
                        <div class="col-md-6"><a href="{{route('assignments.create')}}" class="btn btn-lg btn-primary pull-right"><i class="fa fa-plus m-r-10"></i> Create New Assignment</a></div>
                    </div>

            <div class="table-responsive">
            <table class="table user-list">
              <thead>
                <tr>
                  <th><span>Title</span></th>
                  <th><span>Class</span></th>
                  <th><span>Created</span></th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              @foreach($assignments as $assignment)
                  <tr>
                  <td>{{ $assignment->title }}</td>
                  <td>{{ $assignment->class->name }}</td>
                  <td>{{ $assignment->created_at }}</td>
                  <td style="width: 20%;">
                    <a href="{{route('assignments.show', $assignment->id)}}" class="table-link success">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                    <a href="{{route('assignments.edit', $assignment->id)}}" class="table-link">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                    <a href="#" class="table-link danger">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>
            </div>
            {{ $assignments->links() }}
            </div>
        </div>
      </div>
@endsection