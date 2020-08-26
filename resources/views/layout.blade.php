<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  @section('title')
  @show
  <title>ระบบ พอ.3</title>

  <!-- Bootstrap core CSS -->
  @yield('css')

</head>

<body>

  <!-- <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">A Free Bootstrap 4 Business Theme</span>
    <span class="site-heading-lower">Business Casual</span>
  </h1> -->

  <!-- Navigation -->
  @include('navbar')

  @yield('content')

  <!-- Bootstrap core JavaScript -->
    @yield('js')

</body>

</html>
