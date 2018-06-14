@extends('layouts.admin')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body"> 

                  <div class="row">
                      <div class="col-md-6"><h4>Manage Users</h4></div>
                      <div class="col-md-6"><a href="{{route('users.create')}}" class="btn btn-lg btn-primary pull-right"><i class="fa fa-user-plus m-r-10"></i> Create New User</a></div>
                  </div>

                  <div class="table-responsive">
                    <table class="table user-list">
                      <thead>
                        <tr>
                          <th><span>ID</span></th>
                          <th><span>Name</span></th>
                          <th><span>Email</span></th>
                          <th><span>Date Created</span></th>
                          <th><span>Actions</span></th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($users as $user)
                        <tr>
                          <td>{{ $user->id }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->created_at }}</td>
                          <td style="width: 20%;">
                            <a href="#" class="table-link success">
                              <span class="fa-stack">
                                <i class="fa fa-square fa-stack-2x"></i>
                                <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                              </span>
                            </a>
                            <a href="{{route('users.edit', $user->id)}}" class="table-link">
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