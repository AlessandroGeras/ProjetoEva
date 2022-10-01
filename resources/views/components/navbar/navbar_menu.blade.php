<div id="navbar_menu" class="mobile_close w-full h-full block bg-blue-500 float-left lg:float-right lg:w-[700px] lg:bg-transparent">
  <ul class="font-bold center text-center justify-center leading-none lg:flex lg:dark:text-white">
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
        <a class="link lg:mt-12" onclick="event.preventDefault();this.closest('form').submit();">LOGOUT</a>
      </form>
    </li>
    @endauth

  </ul>
</div>
