<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  <title>@yield("title")</title>
  
  <link rel="stylesheet" href="/assets/css/main.css">
  <script src="/assets/js/navbar.js"></script>
  <script src="/assets/js/palestras.js"></script>
</head>

<body>
  <navbar>    
    <div id="navbar">
      <x-navbar.navbar_logo />

      <x-navbar.panel />

      <x-navbar.navbar_menu />
    </div>    
  </navbar>

  @yield("corpo")

  <x-footer />
  
</body>
</html>
