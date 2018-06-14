@extends('layouts.admin')

@section('content')

  <div id="page-content-wrapper">
          <div class="row"> 
            <div class="panel panel-default">
                <div class="panel-body"> 

                    <div class="row">
                        <div class="col-md-6"><h4><i class="fa fa-university m-r-10"></i> Manage Institutes</h4></div>
                        <div class="col-md-6"><a href="{{route('institutes.create')}}" class="btn btn-lg btn-primary pull-right"><i class="fa fa-plus m-r-10"></i> Create New Institute</a></div>
                    </div>

                    <div class="table-responsive">
                        <table class="table user-list">
                          <thead>
                            <tr>
                              <th><span>ID</span></th>
                              <th><span>Institute</span></th>
                              <th><span>Email</span></th>
                              <th><span>Actions</span></th>
                            </tr>
                          </thead>
                          <tbody>
                             @foreach ($users as $user)
                                  <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td style="width: 20%;">
                                      <a href="#" class="table-link success">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a href="{{route('institutes.edit', $user->id)}}" class="table-link">
                                        <span class="fa-stack">
                                          <i class="fa fa-square fa-stack-2x"></i>
                                          <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                                        </span>
                                      </a>
                                      <a href="#" class="table-link danger" onclick="destroy({{ $user->id }})">
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

                   {{ $users->links() }}

                </div>
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
              url: 'users/'+id,
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