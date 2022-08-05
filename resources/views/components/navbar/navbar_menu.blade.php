<div id="navbar_menu" class="mobile_close">
  <ul class="menu_ul">
    <li><a class="menu_link" href="#">PROFISSIONAIS</a></li>
    <li><a class="menu_link" href="#">ESPAÇO VIDA</a></li>
    <li><a class="menu_link" href="#">ACOMPANHAMENTO FAMILIAR</a></li>

    @guest
    <li><a class="menu_link" href="/login">LOGIN</a></li>
    <li><a class="menu_link" href="/register">CADASTRAR</a></li>
    @endguest

    @auth
    <li><a class="menu_link" href="/dashboard">MINHA CONTA</a></li>
    <li>
      <form action="/logout" method="POST">
        @csrf
        <a class="menu_link" href="/logout" onclick="event.preventDefault();this.closest('form').submit();">LOGOUT</a>
      </form>
    </li>
    @endauth

  </ul>
</div>