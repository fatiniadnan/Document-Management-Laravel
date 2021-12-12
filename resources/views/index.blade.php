@extends('template.main')

@section('content')

@if (Route::has('login'))
                         
                  @auth
                               
                                
                                <h1 class="text-center">Hi from index</h1>
   
                                <p class="text-center">Üdvözöljük {{auth()->user()->name}}!</p>
                                
                             

                                <table class="table" style="text-align: center; color:white; background-color: #212529;">
      
                                    <thead>
                                      <tr>
                                        <th scope="col">File</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Create Date</th>
                                        <th scope="col">Update Date</th>
                                        <th scope="col">Operations</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($files as $file)
                                        <tr>
                                         <td>{{ $file->name }}</td>
                                        <td>{{ $file->size }} Bytes</td>
                                        <td>{{ $file->created_at }}</td>
                                        <td>{{ $file->updated_at }}</td>
                                        
                                        <td>
                                        <a class="btn btn-sm btn-primary" href="" role="button">Show</a>
                                        <a class="btn btn-sm btn-primary" href="" role="button">Edit</a>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $file->id }}').submit()">
                                              Delete
                                        </button>
                                          <form id="delete-user-form-{{ $file->id }}" action="" method="POST" style="display: none;">
                                          @csrf
                                          @method("DELETE")
                                      </form>
                                        </td>
                                      </tr>
                                        @endforeach
                                        
                                    </tbody>
                                  </table>


                                
                              


                                @else
                                <h1 class="text-center">Kérjük jelentkezzen be!</h1>
                                <p class="text-center">Amennyiben még nem regisztált, kérjük tegye meg.</p>
                                @endauth


                  @endif

   
  
@endsection