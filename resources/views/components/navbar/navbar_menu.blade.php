<div id="navbar_menu" class="mobile_close w-full h-full font-serif block bg-blue-500 float-left lg:float-right lg:w-2/3 lg:bg-transparent xl:w-1/2">
  <ul class="font-bold center text-center leading-none lg:flex">
    <li><a class="link" href="{{ route('profissionais')}}">PROFISSIONAIS</a></li>
    <li><a class="link" href="{{ route('eva')}}">PROJETO EVA</a></li>
    <li><a class="link" href="{{ route('palestras')}}">PALESTRAS</a></li>

    @guest
    <li><a class="link" href="{{ route('login')}}">LOGIN</a></li>
    <li><a class="link" href="{{ route('register')}}">CADASTRAR</a></li>
    @endguest

    @auth   
    <li><a class="link" href="{{ route('dashboard')}}">MINHA CONTA</a></li>
    <li>
      <form action="{{ route('logout')}}" method="POST">
        @csrf
        <a class="link" onclick="event.preventDefault();this.closest('form').submit();">LOGOUT</a>
      </form>
    </li>
    @endauth

  </ul>
</div>
