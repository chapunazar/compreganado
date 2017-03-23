<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Compre Ganado</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />


    <!-- Select 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="/css/admin.css" rel="stylesheet">


    <!-- FileInput template 
    <link href="/css/fileinput.css" rel="stylesheet">
    <link href="/themes/explorer/theme.css" media="all" rel="stylesheet" type="text/css"/>
    -->

    <!-- VUE 2
    <script src="https://unpkg.com/vue"></script>
-->

    

  </head>

  <body>

      @include('console.nav')

      <div class="container-fluid" id="main">
        <div class="row row-offcanvas row-offcanvas-left">
            @include('console.leftmenu')
            
            <div class="col-md-9 col-lg-10 main">
                @if ($flash = session('message'))
                    <div id="flash-message" class="row justify-content-center">
                        <div class="alert alert-{{ session('message-type','info') }} col-lg-4" role="alert">
                            <center>{{ $flash }}</center>
                        </div>
                    </div>
                @endif
            <!--toggle sidebar button
            <p class="hidden-md-up">
                <button type="button" class="btn btn-primary-outline btn-sm" data-toggle="offcanvas"><i class="fa fa-chevron-left"></i> Menu</button>
            </p>-->

            @yield('content')
                
            </div>
        <!--/main col-->
        </div>

      </div>
<!--/.container-->


    @include('console.footer')

    @yield('scripts')

  </body>
</html>