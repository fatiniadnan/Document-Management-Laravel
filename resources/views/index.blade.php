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
                                


                <h1 class="text-center m-4" style="color: #212529;">Imarah Eco Friends</h1>
   
                <p class="text-center" style="color: #212529; font-size:x-large">Welcome, {{auth()->user()->name}}!</p>
          
                                
                                <div class="col-md-4 m-3" style="margin-bottom:10px;">
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

                                <div class="col-md-4 ms-3" style="margin-bottom:10px;">
              
                                    <a style="color: #212529;">Order by: </a>
                                  
                                      <a href="{{ route('index') }}">File name</a>
                                      <a style="color: #212529;">   |  </a>                               
                                      <a href="{{ route('index-order') }}">Update Date</a>
                                    
                                  </div>

                                  <div class="px-2">
                                  <a class="btn btn-primary float-end me-5" href="{{ route('upload-file') }}" style="font-size:large;">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-upload me-2" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                  </svg>
                                  
                                  New File</a>
                                  </div>

                                  <div class="card m-4">
                                  <div class="px-2">
                                  <div class="container">
                                  <table class="table">
           
                                    <thead>
                                      <tr style="color: #212529;">
                                        <th scope="col" style="color: #212529;" class=".th-lg">File</th>
                                        <th scope="col" style="color: #212529;" class=".th-lg">Size</th>
                                        <!-- <th scope="col">From</th> -->
                                        <!-- <th scope="col" style="color: #212529;" class=".th-lg">Create Date</th> -->
                                        <th scope="col" style="color: #212529;" class=".th-lg">Update Date</th>
                                        <th scope="col" style="color: #212529;" class=".th-lg">Action</th>
                                        <!-- <th scope="col">Edit Text</th> -->
                                      </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($files as $file)
                                        <tr>
                                         <td style="word-wrap: break-word; min-width: 160px;max-width: 160px; color: #212529;">{{ $file->name }}</td>
                                        <td style="color: #212529;">{{ $file->size }} Bytes</td>
                                        <!-- <td>{{ $file->sendername}}</td> -->
                                        <!-- <td style="color: #212529;">{{ $file->created_at }}</td> -->
                                        <td style="color: #212529;">{{ $file->updated_at }}</td>
                                        
                                        <td>
                                        <!-- <a class="btn btn-sm btn-primary" href=" upload.show/{{$file->id}}" role="button">Show</a> -->
                                        <a  href="{{route('download', $file->id)}}">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0d6efd" class="bi bi-download me-4" viewBox="0 0 16 16">
                                          <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                          <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>

                                        </a>
                                       
                                        <a onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $file->id }}').submit()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fb0400" class="bi bi-trash3-fill me-4" viewBox="0 0 16 16">
                                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                        </svg>
                                        </a>
                                        
                                        <form id="delete-user-form-{{ $file->id }}" action="{{route('delete', $file->id)}}" method="POST" enctype="multipart/form-data" style="display: none;">
                                          @csrf
                                          </form>

                                          <a href="{{ route('send.send') }}"">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0d6efd" class="bi bi-share me-4" viewBox="0 0 16 16">
                                            <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                                          </svg>
                                        </a>

                                        @if (strpos($file->name, '.txt'))
                                          <a class="btn btn-sm btn-primary" href=" upload.edit/{{$file->id}}" role="button">Edit</a>
                                          @endif  

                                        </td>

                                      </tr>
                                        @endforeach
                                       
                                    </tbody>
                                  </table>

                                  </div>
                                  </div>
                                  </div>

                                  <div class="px-3">

                                  <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="{{ $files->previousPageUrl() }}">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="{{ $files->nextPageUrl() }}">Next</a></li>
                        
                                </ul>
                                  
                                  </div>
      
                              </div>

                                @else
                                <h1 class = "text-center" style="color: #212529;"> Please log in! </h1>
                                <p class = "text-center" style="color: #212529;"> If you haven't registered yet, please do. </p>
                                @endauth


                  @endif

   
  
@endsection