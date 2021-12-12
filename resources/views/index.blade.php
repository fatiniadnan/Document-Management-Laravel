@extends('template.main')

@section('content')

@if (Route::has('login'))
                         
                  @auth
                               
                                
                                <h1 class="text-center">Hi from index</h1>
   
                                <p class="text-center">Üdvözöljük {{auth()->user()->name}}!</p>
                                
                                @foreach($files as $file)
                                <td>{{ $file->name }}</td><br>
                                <td>{{ $file->file_path }}</td><br>
                                <td>{{ $file->size }}</td><br><br><br>
                                
                               @endforeach


                                @else
                                <h1 class="text-center">Kérjük jelentkezzen be!</h1>
                                <p class="text-center">Amennyiben még nem regisztált, kérjük tegye meg.</p>
                                @endauth


                  @endif

   
  
@endsection