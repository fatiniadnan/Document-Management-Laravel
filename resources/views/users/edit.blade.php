@extends('template.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header" style="color: black;">{{ __('Edit User') }}</div> 

                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', $user->id) }}">

                    @method('PATCH')    
                    @include('partials.form')
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

