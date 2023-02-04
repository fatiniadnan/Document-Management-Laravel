@extends('template.main')

@section('content')
<div class="m-5">


<h1 class="text-center" style="color: black;">New Text File</h1>
    

<form action="{{route('uploadText')}}" method="post" enctype="multipart/form-data" >
    @csrf
       
      
    <div class="form-group">
      <label class="mb-3" for="name" style="color: black;">File Name</label> 
      <input id="name" name="name" type="text" required="required" class="form-control" placeholder="Title">
    </div>
    <div class="form-group mt-3">
      <label class="mb-3" for="text" style="color: black;">Text</label> 
      <textarea id="text" name="text" cols="40" rows="10" required="required" class="form-control" placeholder="Text Body"></textarea>
    </div> 
    <div class="form-group mt-4">
      <button name="submit" type="submit" class="btn btn-lg btn-primary">Submit</button>
    </div>
  </form>


</div>



@endsection

