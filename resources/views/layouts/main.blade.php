<?php date_default_timezone_set('America/Sao_Paulo'); ?>

<html>

<head>  
  <title>@yield("title")</title>

  <x-layouts.head />  
</head>

<body>
  @if(session('msg'))
  <script>message("<?php echo session('msg') ?>")</script>
  @endif

  <navbar>
    <div class="h-24 dark:bg-gray-900">
      <x-navbar.navbar_logo />

      <x-navbar.navbar_panel />

      <x-navbar.navbar_menu />
    </div>
  </navbar>

  @yield("corpo")
<!--
  <x-navbar.footer />
-->

</body>

</html>
