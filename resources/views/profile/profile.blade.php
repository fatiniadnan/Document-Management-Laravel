@extends('template.main')

@section('content')

<form method="POST" action="{{ route('user-profile-information.update') }}" style="padding: 30px;">
    @csrf
    @method("PUT")
    <div class="col-md-4 col-md-offset-4" style="margin: auto;">
  <div class="mb-3">
    <label for="name" class="form-label">Full name</label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" value="{{ auth()->user()->name }}">
    @error('name')
        <span class="invalid-feedback" role="alert">
          {{ $error }}
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ auth()->user()->email }}">
    @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>

  
 
  <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>
   
  
@endsection