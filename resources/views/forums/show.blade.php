@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
    <div class="row">
        <h4><i class="fa fa-book m-r-10"></i> {{ $forum->name }} Forum</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/forums"><i class="fa fa-book"></i> Forums</a></li>
          <li class="active">{{ $forum->name }} Forum</li>
        </ol>

        <div class="row">
            <div class="col-md-6"><h4><i class="fa fa-file m-r-10"></i> Topics</h4></div>
            <div class="col-md-6">
                @role(['teacher'])
                <a href="{{route('topics.new',$forum->id)}}" class="btn btn-lg btn-primary pull-right">
                  <i class="fa fa-plus m-r-10"></i> Create New Topic
                </a>
                @endrole
            </div>
        </div>

        <div class="table-responsive">
            <table class="table user-list">
              <thead>
                <tr>
                  <th><span>Topic</span></th>
                  <th><span>Description</span></th>
                  <th><span>Created</span></th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              @foreach($topics as $topic)
                  <tr>
                  <td>{{ $topic->name }}</td>
                  <td>{{ strip_tags($topic->description) }}</td>
                  <td>{{ $topic->created_at }}</td>
                  <td style="width: 20%;">
                    <a href="{{route('topics.show', $topic->id)}}" class="table-link success">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                    @role(['teacher'])
                    <a href="{{route('topics.edit', $topic->id)}}" class="table-link">
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
                    @endrole
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>
            </div>
            {{ $topics->links() }}
            </div>
    </div>
@endsection