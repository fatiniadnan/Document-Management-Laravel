@extends('template.main')

@section('content')

<form method="POST" action="{{ route('user-profile-information.update') }}" style="padding: 30px;">
    @csrf
    @method("PUT")
    <div class="col-md-4 col-md-offset-4" style="margin: auto;">
    <h3 class="text-center mb-3" style="color: black;">{{auth()->user()->name}}'s Profile</h3>
   
  
  <!-- Edit Name -->
  <hr style="color: darkgray;">
  <div class="row pt-2">
      <div class="col-sm-3" style="color: black;">
        <p class="mb-0">Full Name</p>
      </div>

      <div class="col-sm-9" style="color: black;"> 
      <p name="name" id="name" class="text-muted mb-0">{{ auth()->user()->name }}</p>
      
      @error('name')
          <span class="invalid-feedback" role="alert">
            {{ $message }}
          </span>
      @enderror

      </div>
  </div>
  <hr style="color: darkgray;">
  <hr>

  <!-- Edit Email -->
  <div class="row">
    <div class="col-sm-3" style="color: black;">
      <p for="email" class="form-label">Email: </p>
    </div>

    <div class="col-sm-9" style="color: black;">
      <p name="email" type="email" class="@error('email') is-invalid @enderror text-muted mb-0" id="email"> {{ auth()->user()->email }} </p>
      
      @error('email')
          <span class="invalid-feedback" role="alert">
              {{ $message }}
          </span>
      @enderror

    </div>
  </div>
  
  <hr style="color: darkgray;">
  <hr>

  <!-- Edit Phone No -->
  <div class="row">
    <div class="col-sm-3"" style="color: black;">
      <p class="mb-0">Phone No</p>
    </div>

    <div class="col-sm-9" style="color: black;">
      <p name="phone_no" class="@error('phone_no') is-invalid @enderror text-muted mb-0" id="phone_no" > {{ auth()->user()->phone_no }}</p>

        @error('phone_no')
            <span class="invalid-feedback" role="alert">
              {{ $message }}
            </span>
        @enderror

    </div>    
  </div>
  <hr style="color: darkgray;">
  <hr>

  <!-- Edit Matric No -->
  <div class="row">
    <div class="col-sm-3" style="color: black;">
      <p class="mb-0">Matric No</p>
    </div>

    <div class="col-sm-9" style="color: black;">
      <p name="matric_no" type="text" class="@error('matric_no') is-invalid @enderror text-muted mb-0" id="matric_no">{{ auth()->user()->matric_no }}</p>
      
        @error('matric_no')
          <span class="invalid-feedback" role="alert">
            {{ $message }}
          </span>
      @enderror
    </div>
  </div>
  <hr style="color: darkgray;">
  <hr>

  <!-- Edit Faculty -->
  <div class="row">
    <div class="col-sm-3" style="color: black;">
      <label for="faculties" class="form-label">Department: </label>
    </div>

    <div class="col-sm-9" style="color: black;">
      <p name="faculties" class="text-muted" id="faculties"> 
        @foreach(auth()->user()->faculties as $faculty)  
       
        {{ $faculty->name }}
        
        @endforeach
      </p>
    </div>
  </div>
  <hr style="color: darkgray;">
  <hr>

  <a type="submit" class="btn btn-primary" role="button" href="{{ route('user.edit', auth()->user()->id) }}">Edit Profile</a>

</div>
</form>


<form action="{{ route('update-pass') }}" method="post">
  <h3 class="text-center mb-3" style="color: black;">Reset Password</h3>
  @csrf
  <div class="col-md-4 col-md-offset-4" style="margin: auto;">
  <div class="form-group mb-3" style="color: black;">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password" id="password">
      @error('password')
          <p class="text-danger mt-2">{{ $message }}</p>
      @enderror
  </div>
  <div class="form-group mb-3">
      <label for="password_confirmation" style="color: black;">Confirm Password</label>
      <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" id="password_confirmation">
      @error('password_confirmation')
          <p class="text-danger mt-2">{{ $message }}</p>
      @enderror
  </div>
  <div class="form-group mb-3">
      <input type="hidden">
  </div>
  <button type="submit" class="btn btn-primary mb-5">Set New password</button>
</div>
</form>

  
@endsection