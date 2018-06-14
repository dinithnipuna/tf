@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
    <div class="row">
        <h4><i class="fa fa-book m-r-10"></i> Notebooks</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/notebooks"><i class="fa fa-book"></i> Notebooks</a></li>
          <li class="active">{{ $notebook->name }}</li>
        </ol>
        <h4>{{ $notebook->name }}</h4>
        <div class="row">
            <div class="col-md-6"><h4><i class="fa fa-file m-r-10"></i> Notes</h4></div>
            <div class="col-md-6"><a href="{{route('notes.new',$notebook->id)}}" class="btn btn-lg btn-primary pull-right"><i class="fa fa-plus m-r-10"></i> Create New Note</a></div>
        </div>

        <div class="table-responsive">
            <table class="table user-list">
              <thead>
                <tr>
                  <th><span>Name</span></th>
                  <th><span>Body</span></th>
                  <th><span>Created</span></th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              @foreach($notes as $note)
                  <tr>
                  <td>{{ $note->title }}</td>
                  <td>{{ strip_tags($note->body) }}</td>
                  <td>{{ $note->created_at }}</td>
                  <td style="width: 20%;">
                    <a href="{{route('notes.show', $note->id)}}" class="table-link success">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                    <a href="{{route('notes.edit', $note->id)}}" class="table-link">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                    <a href="#" class="table-link danger" onclick="destroy({{ $note->id }})">
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
            {{ $notes->links() }}
            </div>
    </div>
@endsection

@section('script') 
<script>

  $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
  });

  function destroy(id) {
      var r = confirm("Confirm Deletion");
      if (r == true) {
          $.ajax({
              url: '{{ url('notes') }}/'+id,
              type: 'DELETE',
              success: function(result) {
                  location.reload();
              }
          });
      } else {
          
      }
  }
</script>
@endsection