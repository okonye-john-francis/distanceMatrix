<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Google Matrix</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}"/>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.min.css') }}"/>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Nearest Storage Location Generator</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
  </nav>


  <div class="container mt-4">
      <div class="row">
          <div class="col-md-8">

              @yield('content')

          </div>
          <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div class="card-header" id="card-title">
                  All Storage Locations
                </div>
                <ul class="list-group list-group-flush mt-4 mb-4" id="storage_location_list">
                  @foreach( $markers as $marker )
                      <li class="ml-4" style="opacity: 0.7; font-size:12px;">{{ $marker->name }}</li>
                  @endforeach
                </ul>
              </div>
          </div>
      </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

  <!-- Footer -->
<!--   <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; UgBankers 2019</p>
    </div>
  </footer> -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG254Os9XwAxcoRYRdfLW5AlIyJrKn3cU&libraries=places&callback=initMap" async defer></script>
  @stack('scripts')

  <script type="text/javascript">
    $(function(){

        $('#myTable').DataTable();
    });
  </script>

</body>

</html>
