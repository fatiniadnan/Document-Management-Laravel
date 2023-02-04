@extends('template.main')

@section('content')


        <div class="m-4 text-sm text-gray-600" style="color: black;">
            {{ __('You must verify your email address to access this page') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="m-4 font-medium text-sm text-green-600" style="color:black">
                {{ __('A verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="m-3">
                    <button  type="submit">
                        {{ __('Send Verification Email') }}
                    </button>
                </div>
            </form>

            <div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class=" text-sm m-3">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>

        @endsection
