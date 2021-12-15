@extends('template.main')

@section('content')

@if (Route::has('login'))
                         
                  @auth
                  @csrf
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <strong>{{ $message }}</strong>
                  </div>
                @endif
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
                                
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
                                        <th scope="col">Edit Text</th>
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
                                        <a class="btn btn-sm btn-primary" href=" upload.show/{{$file->id}}" role="button">Show</a>
                                       
                                      
                                       
                                        <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $file->id }}').submit()">
                                              Delete
                                        </button>
                                          <form id="delete-user-form-{{ $file->id }}" action="{{route('delete', $file->id)}}" method="POST" enctype="multipart/form-data" style="display: none;">
                                          @csrf
                                      </form>
                                        </td>
                                        <td>
                                          @if (strpos($file->name, '.txt'))
                                          <a class="btn btn-sm btn-primary" href=" upload.edit/{{$file->id}}" role="button">Edit</a>
                                          @endif  
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