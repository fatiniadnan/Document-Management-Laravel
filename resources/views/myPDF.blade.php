<!DOCTYPE html>
<html>
<head>
    <title>List of Imarah Eco Friends' Members</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
  
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Matric No</th>
            <th>Phone No</th>
            <th>Joined Date</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->matric_no }}</td>
                <td>{{ $user->phone_no }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>