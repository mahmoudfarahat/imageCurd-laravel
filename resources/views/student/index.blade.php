
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>
<body>

    @if (session('status'))
    <h6>{{session('status')}}</h6>
@endif
    <a href="{{ url('add-student')}}" class="btn btn-primary">Add Student</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Course</th>
            <th scope="col">Image</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($student as $item)
          <tr>
            <th scope="col">{{$item ->id }}</th>
            <th scope="col">{{$item ->name }}</th>
            <th scope="col">{{$item ->email }}</th>
            <th scope="col">{{$item ->course }}</th>
            <th scope="col"><img src="{{ asset('uploads/students/'.$item ->profile_image)}}" width="50px" alt=""></th>
            <th scope="col">
                <a class="btn btn-primary" href="{{ url('editstudent/'.$item ->id)}}">Edit</a> </th>
            <th scope="col">
                {{-- <a   class="btn btn-danger" class="btn btn-primary" href="{{ url('deletestudent/'.$item ->id)}}">
                    Delete</a> --}}

                    <form action="{{url('deletestudent/'.$item ->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </th>

          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>
