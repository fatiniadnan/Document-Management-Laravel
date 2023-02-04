@extends('template.main')

@section('content')


<h1 class="text-center m-5" style="color: black;">Send Files</h1>
 
<form action="{{ route('send-mail') }}" method="POST" enctype="multipart/form-data">

  @csrf
  <div class="form-group row m-4">
    <label for="address" class="col-2 col-form-label" style="color: black;">Recipient</label>

    <div class="col-10">
      <select  style="width: 50%;" id="address" name="address" required="required" class="custom-select">
        @foreach($users as $user)
        <option value="{{ $user->name }}">{{ $user->name }}</option>
        @endforeach
      </select>
    </div>

  </div>

  <div class="form-group row m-4">
    <label for="select" class="col-2 col-form-label" style="color: black;">Select Files</label> 
    <div class="col-10">
    <!-- <input type="file" name="filename[]" class="form-control" multiple> -->
      <select style="width: 50%;" multiple="multiple" id="select" name="select[]" required="required" class="custom-select">
        
      @foreach($files as $file)
      
        <option value="{{ $file->name }}">{{ $file->name }}</option>
        
        @endforeach
      </select>

    </div>
  </div> 

  <div class="form-group row m-5">
    <div class="offset-2 col-10">
      <button name="submit" type="submit" class="btn btn-lg btn-primary">Send</button>
    </div>
  </div>

</form>

@endsection