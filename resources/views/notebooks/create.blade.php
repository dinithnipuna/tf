@extends('layouts.app')

@section('title', 'Teacher Finder')

@section('content')
<div class="container page-content">
      <div class="row">
      <h4><i class="fa fa-book m-r-10"></i> Notebooks</h4>
        <ol class="breadcrumb">
          <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="/notebooks"><i class="fa fa-book"></i> Notebooks</a></li>
          <li class="active">Create New Notebook</li>
        </ol>
        <div class="col">
          <div class="widget">
             
              <!-- form start -->
                    <form role="form" action="{{route('notebooks.store')}}" method="POST">
                      {{csrf_field()}}      
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
                        </div>

                        <button type="submit" class="btn btn-primary">Create New Notebook</button>
                           
                    </form>   
            </div>
        </div>
      </div>
    </div>
@endsection