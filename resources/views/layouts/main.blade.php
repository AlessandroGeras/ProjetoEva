<?php date_default_timezone_set('America/Sao_Paulo'); ?>

<html>

<head>
  <meta charset="UTF-8">
  <title>@yield("title")</title>
  <link rel="stylesheet" href="/assets/css/main.css">
  <script src="/assets/js/navbar.js"></script>
  <script src="/assets/js/palestras.js"></script>
  <script src="/assets/js/toaster.js"></script>
  <script src="/assets/js/account.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.0/jquery-migrate.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
</head>

<body>
  @if(session('msg'))
  <script>message("<?php echo session('msg') ?>")</script>
  @endif

  <navbar>
    <div id="navbar">
      <x-navbar.navbar_logo />

      <x-navbar.navbar_panel />

      <x-navbar.navbar_menu />
    </div>
  </navbar>

  @yield("corpo")

  <x-navbar.footer />

</body>

</html>
