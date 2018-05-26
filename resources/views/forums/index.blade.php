@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
      <div class="row">
        <div class="col">
          <div class="widget">
             
              <div class="row">
                    <div class="col-md-6"><h4><i class="fa fa-book m-r-10"></i> Forums</h4></div>
              </div>

            <div class="table-responsive">
            <table class="table user-list">
              <thead>
                <tr>
                  <th><span>Name</span></th>
                  <th><span>Created</span></th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              @foreach($forums as $forum)
                  <tr>
                  <td>{{ $forum->name }}</td>
                  <td>{{ $forum->created_at }}</td>
                  <td style="width: 20%;">
                    <a href="{{route('forums.show', $forum->id)}}" class="table-link success">
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
            {{ $forums->links() }}
            </div>
        </div>
      </div>
@endsection