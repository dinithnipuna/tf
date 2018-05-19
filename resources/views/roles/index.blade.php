@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
              <div class="panel panel-default">
                  <div class="panel-body"> 

                    <div class="row">
                        <div class="col-md-6"><h4>Manage Roles</h4></div>
                        <div class="col-md-6"><a href="{{route('admin.users.create')}}" class="btn btn-lg btn-primary pull-right"><i class="fa fa-user-plus m-r-10"></i> Create New Role</a></div>
                    </div>
                  
                      <div class="table-responsive">
                        <table class="table user-list">
                          <thead>
                            <tr>
                              <th><span>ID</span></th>
                              <th><span>Name</span></th>
                              <th><span>Display Name</span></th>
                              <th><span>Description</span></th>
                              <th><span>Actions</span></th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach ($roles as $role)
                            <tr>
                              <td>{{ $role->id }}</td>
                              <td>{{ $role->name }}</td>
                              <td>{{ $role->display_name }}</td>
                              <td>{{ $role->description }}</td>
                              <td style="width: 20%;">
                                <a href="#" class="table-link success">
                                  <span class="fa-stack">
                                    <i class="fa fa-square fa-stack-2x"></i>
                                    <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                  </span>
                                </a>
                                <a href="{{route('admin.roles.edit', $role->id)}}" class="table-link">
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

                      {{ $roles->links() }}
                  </div> 
              </div>
        </div>
    </div>
@endsection