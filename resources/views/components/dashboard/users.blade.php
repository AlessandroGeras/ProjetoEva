<div class="admin_container">
  <div class="admin_button" onclick="users();">Usuários</div>
</div>

<div id="users_styled_input_container">
  <div class="styled_input">
    <form action="{{route('dashboard')}}" method="GET" onsubmit="loading('Pesquisando usuário')">
      @csrf
      <input class="styled_warning" type="text" name="search" placeholder="Digite o nome do usuário" required></input>
      <button type="submit" class="styled_warning"> &#129122;</button>
    </form>
  </div>

  @if(isset($users))
  <div class="styled_active">
    <script>
      users();
    </script>
    <br>
    @if (count($users) == 0)
    <span>Nenhum Usuário Encontrado<span><br>
        @endif

        @if (count($users) > 0)
        @if (count($users) == 1)
        <span>Usuário Encontrado<span><br>
        @endif
            @if (count($users) > 1)
            <span>Usuários Encontrados<span><br>
            @endif

                @foreach($users as $user_found)

                <div class="styled_input">
                  <form action="{{ route('user', [$user_found->id])}}" method="GET" onsubmit=>
                    @csrf
                    <input type="hidden" name="id" value="{{$user_found->id}}">
                    <input class="styled_warning" type="text" value="{{$user_found->name}}" readonly></input>
                    <button class="styled_warning" onclick="loading('Pesquisando informações do usuário')"> &#129122;</button>
                  </form>
                </div>
                @endforeach
  </div>
  @endif
  @endif
</div>
</div>
</div>