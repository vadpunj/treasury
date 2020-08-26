@extends('layout')

@section('title')
<title>Welcome</title>
@endsection

@section('css')

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- <link href="{{asset('font')}}" rel="stylesheet"> -->
  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/business-casual.min.css')}}" rel="stylesheet">

@endsection
</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-lower">Home Page</span>
  </h1>

  <!-- Navigation -->
@section('content')
  <form>
    <div class="col-lg-12">
      <div class="form-group">
        <h1 align="center">ยินดีต้อนรับ</h1>
      </div>
    </div>
</form>
@endsection

  <!-- Bootstrap core JavaScript -->
@section('js')
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@endsection
</body>

</html>
