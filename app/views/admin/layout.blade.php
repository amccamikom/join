<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin Join AMCC</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ $helper->base_url('/assets/css/admin.css') }}">

  @stack('styles')
</head>
<body>
  <nav class="navbar navbar-full navbar-dark bg-primary main-nav">
    <div class="container">
      <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
        &#9776;
      </button>
      <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
      <a class="navbar-brand" href="{{ $helper->route('admin') }}">Join AMCC</a>
        <ul class="nav navbar-nav">
          <li class="nav-item"><a class="nav-link" href="{{ $helper->route('admin') }}">Member <span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a class="nav-link" href="{{ $helper->route('admin.stats') }}">Statistik</a></li>
        </ul>
        <form action="{{ $helper->route('admin.logout') }}" method="post" class="form-inline pull-sm-right">
          <p class="form-control-static">me@amcc.or.id</p>
          <button class="btn btn-warning" type="submit">Keluar</button>
        </form>
      </div>
    </div>
  </nav>

  <main class="content">
    @yield('content')
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
  <script src="{{ $helper->base_url('/assets/js/admin.js') }}"></script>

  <script>
    (function($) {
      $('.main-nav a[href="' + location.pathname + '"]').parent().addClass('active');
    })(jQuery);
  </script>

  @stack('scripts')
</body>
</html>
