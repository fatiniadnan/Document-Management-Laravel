@extends('template.main')

@section('content')

<h1 class="text-center">New text file</h1>
    

<form action="{{route('uploadText')}}" method="post" enctype="multipart/form-data" >
    @csrf
       
      
    <div class="form-group">
      <label for="name">File name</label> 
      <input id="name" name="name" type="text" required="required" class="form-control">
    </div>
    <div class="form-group">
      <label for="text">Text</label> 
      <textarea id="text" name="text" cols="40" rows="10" required="required" class="form-control"></textarea>
    </div> 
    <div class="form-group">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>


@endsection

