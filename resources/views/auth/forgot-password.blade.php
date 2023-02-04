@extends('template.main')

@section('content')

        <form action="{{ route('password.email') }}" method="POST" class="m-5">
            <h3 class="text-center mb-3" style="color: black;">Reset Password</h3>
            @csrf
           

        <div class="col-md-4 col-md-offset-4" style="margin: auto;">
        
        <div class="form-group mb-3">
                <label for="email" style="color:black">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" id="email" value="">
                @error('email')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mb-5">Sent Reset Link</button>

        </div>
        </form>

        @endsection

