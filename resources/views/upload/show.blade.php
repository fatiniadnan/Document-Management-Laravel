@extends('template.main')

@section('content')
@foreach ($files as $file)

@if ($file->owner == Auth::user()->id ?? '')
    {{ $file->name }}<br>
    {{ $file->file_path }}<br>
    {{ $file->size }}<br>
    {{ $file->created_at }}<br>
    {{ $file->updated_at }}<br>

    @if (strpos($file->name, '.txt'))
    
    <div class="card" style="background-color: lightgray; color:black; width:50%; margin:auto;">
        <iframe 
        width="100%"
        height="100%"
        src="{{ URL::asset($file->file_path) }}" style="margin:auto"></iframe>
    </div>

        @else

<iframe 
    width="560"
    height="315"
    src="{{ URL::asset($file->file_path) }}" style="margin:auto"></iframe>

        @endif  

    
@else
    <h3 class="text-center">Sorry, you dont have permission to view this file!</h3>
@endif



@endforeach
    
@endsection