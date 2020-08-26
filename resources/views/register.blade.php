<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register page</title>
  <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/business-casual.min.css')}}" rel="stylesheet">

    <style type="text/css">
      form {
        padding-left: 12rem;
      }
    </style>
  </head>
  <body>
    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">A Free Bootstrap 4 Business Theme</span>
      <span class="site-heading-lower">Business Casual</span>
    </h1>
  <form method="post" href="{{ route('login') }}">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="exampleInputEmail1">Firstname Lastname</label>
        <input type="email" class="form-control" placeholder="Name">
        <label for="exampleInputPassword1">รหัสพนักงาน</label>
        <input type="password" class="form-control" placeholder="รหัสพนักงาน 8 หลัก">
        <label for="exampleInputPassword1">ศูนย์ต้นทุน</label>
        <input type="password" class="form-control" placeholder="ศูนย์ต้นทุน">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  </body>
</html>
