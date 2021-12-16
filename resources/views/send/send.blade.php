@extends('template.main')

@section('content')


<h1 class="text-center">Send Files</h1>



 
<form action="{{route('sendFiles')}}" method="GET" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="address" class="col-2 col-form-label">Addressee</label> 
    <div class="col-10">
      <select  style="width: 50%;" id="address" name="address" required="required" class="custom-select">
        @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-2 col-form-label">Select Files</label> 
    <div class="col-10">
      <select style="width: 50%;" multiple="multiple" id="select" name="select[]" required="required" class="custom-select">
        @foreach($files as $file)
        <option value="{{ $file->name }}">{{ $file->name }}</option>
        @endforeach
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-2 col-10">
      <button name="submit" type="submit" class="btn btn-primary">Send</button>
    </div>
  </div>
</form>


    
@endsection