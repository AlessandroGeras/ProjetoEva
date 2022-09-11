<div id="navbar_menu" class="mobile_close">
  <ul class="menu_ul">
    <li><a class="menu_link" href="#">PROFISSIONAIS</a></li>
    <li><a class="menu_link" href="#">ESPAÇO VIDA</a></li>
    <li><a class="menu_link" href="#">ACOMPANHAMENTO FAMILIAR</a></li>

    @guest
    <li><a class="menu_link" href="{{route('login')}}">LOGIN</a></li>
    <li><a class="menu_link" href="{{route('register')}}">CADASTRAR</a></li>
    @endguest

    @auth
    <li><a class="menu_link" href="/dashboard">MINHA CONTA</a></li>
    <li><a class="menu_link" href="{{route('logout')}}">LOGOUT</a></li> 
    @endauth

  </ul>
</div>
