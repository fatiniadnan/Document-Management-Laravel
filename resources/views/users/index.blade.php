@extends('template.main')

@section('content')

<div class="container">
<div class="row">
  
    <div class="col-12 m-2">
    <a class="btn btn-lg btn-success float-end m-4" href="{{ route('user.create') }}" 
            role="button"> + New User</a>
    <h1 class="text-center m-4" style="color: #212529;">User</h1> 
    
    </div>
    
</div>


   <div class="col-md-4 m-3" style="margin-bottom:10px;">
      <form action="{{ url('search-user') }}" method="GET">
      <div class="input-group">
        <input type="search" name="query" class="form-control">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary">Search</button>
        </span>
        <span class="input-group-btn" style="margin-left: 5px;">
          <button type="submit" href="{{ url('search-user') }}" class="btn btn-primary">Restore search</button>
        </span>
      </div>
      </form>
   </div>

   <div class="col-md-4 m-3" style="margin-bottom:10px;">
                              
                                  
   <a style="color: #212529;">List of Members: </a>
                                  
    <a href="{{ url('generate-pdf') }}">Download Here</a>
                                    
  </div>

<div class="card m-4">
<div class="px-2">
<div class="container">



<table class="table">
  <thead>
    <tr>
      <!-- <th scope="col">#Id</th> -->
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Matric No</th>
      <!-- <th scope="col">Role</th> -->
      <th scope="col">Action</th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>
    @foreach($users as $user)

    <tr>
      <!-- <th scope="row">{{$user->id }}</th> -->
      <td>{{$user->name }}</td>
      <td>{{$user->email }}</td>
      <td>
       {{ $user->matric_no }}
       
      </td>  
      
      <td class="">

        <a href="{{ route('user.edit', $user->id) }}">

          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0d6efd" class="bi bi-pencil-square me-4" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
          </svg>

        </a>
    
        <i onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit()">

          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fb0400" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
          </svg>
           
            </i>

        <form id="delete-user-form-{{ $user->id }}" action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: none">
            @csrf
            @method("DELETE")
        </form>

    </td>
    </tr>

    @endforeach

  </tbody>

</table>


<div class="pagination-block">
  {{ $users->links() }}
</div>


</div>
</div>
</div>


</div>

@endsection