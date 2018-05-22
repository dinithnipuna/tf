@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
      <div class="row">
      <h4><i class="fa fa-book m-r-10"></i> Notebooks</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/notebooks"><i class="fa fa-book"></i> Notebooks</a></li>
          <li class="active">Edit Notebook</li>
        </ol>
        <div class="col">
          <div class="widget">             
              <!-- form start -->
              <form role="form" action="{{route('notebooks.update', $notebook->id)}}" method="POST">
              {{csrf_field()}}   
              {{ method_field('PUT') }}         
                  <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name" value="{{ $notebook->name }}" id="name">
                  </div>

                  <button type="submit" class="btn btn-primary">Save Changes to Notebook</button>
                     
              </form>   
            </div>
        </div>
      </div>
@endsection