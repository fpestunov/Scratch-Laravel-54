<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Album example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">
  </head>

  <body>

    @include('layouts.nav')

    @if ($flash = session('message'))
    <div class="alert alert-success" role="alert">
      {{ $flash }}
    </div>
    @endif

<main role="main" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
<h3 class="pb-3 mb-4 font-italic border-bottom">
            From the FireBlog
          </h3>
    <div class="container">
        @yield('content')        
    </div>
        </div><!-- /.blog-main -->

        @include('layouts.sidebar')

      </div><!-- /.row -->

    </main>
    @include('layouts.footer')
  </body>
</html>
