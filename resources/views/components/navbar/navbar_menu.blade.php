<div id="navbar_menu" class="mobile_close">
  <ul class="menu_ul">
    <li><a class="menu_link" href="#">PROFISSIONAIS</a></li>
    <li><a class="menu_link" href="#">ESPAÇO VIDA</a></li>
    <li><a class="menu_link" href="{{ route('palestras')}}">PALESTRAS</a></li>

    @guest
    <li><a class="menu_link" href="{{ route('login')}}">LOGIN</a></li>
    <li><a class="menu_link" href="{{ route('register')}}">CADASTRAR</a></li>
    @endguest

    @auth   
    <li><a class="menu_link" href="{{ route('dashboard')}}">MINHA CONTA</a></li>
    <li>
      <form action="{{ route('logout')}}" method="POST">
        @csrf
        <a class="menu_link" onclick="event.preventDefault();this.closest('form').submit();">LOGOUT</a>
      </form>
    </li>
    @endauth

  </ul>
</div>