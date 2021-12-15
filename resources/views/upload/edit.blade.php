@extends('template.main')

@section('content')

@foreach ($files as $file)

@if ($file->owner == Auth::user()->id ?? '')

<h1 class="text-center">Text File Edit</h1>


<form action="{{route('update', $file->id)}}" method="POST" enctype="multipart/form-data" >
    @csrf     
    <div class="form-group">
      <label for="name">File name</label> 
      <input id="name" name="name" type="text" required="required" class="form-control" value="{{ $name }}">
    </div>
    <div class="form-group">
      <label for="text">Text</label> 
      <textarea id="text" name="text" cols="40" rows="10" required="required" class="form-control"> {{ $text }}</textarea>
    </div> 
    <div class="form-group">
      <button name="submit" type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>

 

    
@else
    <h3 class="text-center">Sorry, you dont have permission to view this file!</h3>
@endif



@endforeach
    
@endsection