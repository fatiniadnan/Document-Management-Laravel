@extends('template.main')

@section('content')

        <form action="{{ route('update-pass') }}" method="post" class="m-5">
            <h3 class="text-center mb-3" style="color: black;">Reset Password</h3>
            @csrf
            <input type="hidden" name="token" value="{{ $request->token }}">

        <div class="col-md-4 col-md-offset-4" style="margin: auto;">
        
        <div class="form-group mb-3">
                <label for="email" style="color:black">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" id="email" value="{{ $request->email }}">
                @error('email')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3" style="color: black;">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" id="password">
                @error('password')
                    <p class="text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="password_confirmation" style="color:black">Confirm Password</label>
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

