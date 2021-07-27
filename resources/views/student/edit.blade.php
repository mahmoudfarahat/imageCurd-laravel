<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>


    <form class="col-5 m-5" action="{{ url('update/'.$student->id)}}" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
@csrf

@method('PUT')

          <input name="name" type="text" value="{{$student->name}} " class="form-control"  >

        </div>
        <div class="mb-3">

          <input name="email"  type="email"   value="{{$student->email}} " class="form-control"  >
        </div>

        <div class="mb-3">

            <input name="course"   type="text"  value="{{$student->course}} " class="form-control"  >
          </div>
          <div class="mb-3">

            <input  name="profile_image"  type="file" class="form-control"  >
          </div>

          <th scope="col"><img src="{{ asset('uploads/students/'.$student ->profile_image)}}" width="100px" alt=""></th>

<br>
<br>

        <button type="submit" class="btn btn-primary">Save Student  </button>
      </form>
</body>
</html>
