<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Avatar</title>

  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
  <br>
  <div class="container">
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-4">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                           src="{{asset('assets/dist/img/user4-128x128.jpg')}}"
                           alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{$data->name}}</h3>

                    {{-- <p class="text-muted text-center">Software Engineer</p> --}}
<form action="{{route('avatars.update', $data->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('PUT')
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Company Name</b> <a class="float-right"><input type="text" class="form-control" placeholder="Enter company name" name="name" id="name"></a>
                      </li>
                      <li class="list-group-item">
                        <b>Logo</b> <a class="float-right"><input type="file" class="form-control-file" id="exampleFormControlFile1" name="logo" id="logo"></a>
                      </li>
                    </ul>

                    {{-- <a href="#" class="btn btn-primary btn-block"><b>Update</b></a> --}}
                    <button type="submit" class="btn btn-primary btn-block">Updated</button>
                  </div>
                  <!-- /.card-body -->
                </form>
                </div>
                <!-- /.card -->
    </div>
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/dist/js/demo.js')}}"></script>

</body>
</html>