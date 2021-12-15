@extends('template.main')

@section('content')

<h1 class="text-center">New text file</h1>
    

<form action="{{route('uploadText')}}" method="post" enctype="multipart/form-data" >
    @csrf
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
      @endif
      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
      
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

