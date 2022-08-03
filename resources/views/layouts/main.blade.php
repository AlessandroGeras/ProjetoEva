<html>

<head>
  <meta charset="UTF-8">
  <title>@yield("title")</title>
  <link rel="stylesheet" href="/assets/css/main.css">
  <script src="/assets/js/navbar.js"></script>
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
  
</body>
</html>