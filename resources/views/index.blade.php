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
   
                                <p class="text-center">Welcome, {{auth()->user()->name}}!</p>
                               
                                
                                <div class="col-md-4" style="margin-bottom:10px;">
                                  <form action="{{ route('index') }}" method="GET">
                                  <div class="input-group">
                                    <input type="search" name="search" class="form-control">
                                    <span class="input-group-btn">
                                      <button type="submit" class="btn btn-primary">Search</button>
                                    </span>
                                    <span class="input-group-btn" style="margin-left: 5px;">
                                      <button type="submit" href=" {{ route('index') }}" class="btn btn-primary">Restore search</button>
                                    </span>
                                  </div>
                                  </form>
                                </div>

                                <div class="col-md-4" style="margin-bottom:10px;">
                              
                                  
                                    <a>Order by: </a>
                                  
                                      <a href="{{ route('index') }}">File name</a>
                                  
                                   
                                      <a href="{{ route('index-order') }}">Update Date</a>
                                    
                                  </div>
                                  
                                
                                

                                <table class="table" style="text-align: center; color:white; background-color: #212529;">
      
                                    <thead>
                                      <tr>
                                        <th scope="col">File</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">From</th>
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
                                        <td>{{ $file->sendername}}</td>
                                        <td>{{ $file->created_at }}</td>
                                        <td>{{ $file->updated_at }}</td>
                                        
                                        <td>
                                        <a class="btn btn-sm btn-primary" href=" upload.show/{{$file->id}}" role="button">Show</a>
                                        <a class="btn btn-sm btn-primary" href="{{route('download', $file->id)}}" role="button">Download</a>
                                       
                                      
                                       
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
                                  
                                  <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="{{ $files->previousPageUrl() }}">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $files->nextPageUrl() }}">Next</a></li>
                        
                                </ul>

                                
                              </div>

                                @else
                                <h1 class = "text-center"> Please log in! </h1>
                                <p class = "text-center"> If you haven't registered yet, please do. </p>
                                @endauth


                  @endif

   
  
@endsection