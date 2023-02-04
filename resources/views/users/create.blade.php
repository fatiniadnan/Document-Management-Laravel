@extends('template.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card m-5">
            <div class="card-header" style="color: black;"><h4>{{ __('Create New User') }}</h4></div> 

                <!-- Card Body -->
                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}">
                        
                    @include('partials.form', ['create' => true])
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
