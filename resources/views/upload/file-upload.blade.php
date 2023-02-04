@extends('template.main')

@section('content')


<div class="container mt-5">
    <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data" >
      <h3 class="text-center mb-5" style="color: black;">Upload New File</h3>
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
<div style="text-align: center; padding:30px;">
        <div class="custom-file" >
            <input type="file" name="file" class="custom-file-input" id="chooseFile" multiple style="color: black;">
            <label class="custom-file-label" for="chooseFile" style="color: black;">Select file</label>
        </div>

        <button type="submit" name="submit" class="btn  btn-lg btn-primary btn-block mt-5">
            Upload Files
        </button>
    </form>
</div></div>

    
@endsection