@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
      <div class="row">
        <div class="col">
          <div class="widget">
             
              <div class="row">
                        <div class="col-md-6"><h4><i class="fa fa-book m-r-10"></i> Notebooks</h4></div>
                        <div class="col-md-6"><a href="{{route('notebooks.create')}}" class="btn btn-lg btn-primary pull-right"><i class="fa fa-plus m-r-10"></i> Create New Notebook</a></div>
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
              @foreach($notebooks as $notebook)
                  <tr>
                  <td>{{ $notebook->name }}</td>
                  <td>{{ $notebook->created_at }}</td>
                  <td style="width: 20%;">
                    <a href="{{route('notebooks.show', $notebook->id)}}" class="table-link success">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                    <a href="{{route('notebooks.edit', $notebook->id)}}" class="table-link">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                    <a href="#" class="table-link danger" onclick="destroy({{ $notebook->id }})">
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
            {{ $notebooks->links() }}
            </div>
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
              url: 'notebooks/'+id,
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