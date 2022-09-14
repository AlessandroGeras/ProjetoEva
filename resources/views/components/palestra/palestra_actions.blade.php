@php
$inscritos = 0;
$users="<br>";

foreach($manyusers as $userJoined){
$inscritos++;
if($inscritos%2==0){
$users=$users."<li class='inscritos_par'>".$userJoined['name']."</li>";
}
else{
$users=$users."<li class='inscritos_impar'>".$userJoined['name']."</li>";
}
}
@endphp

<div id="palestra_actions">
@if($user->permission->permission==('admin'))
  <div id="inscritos">Inscritos <br>
    &#128101; {{$inscritos}}<br>
    <ul>
      @php
      if($inscritos>0){
      echo $users."</ul>";
      }
    else{
    echo "</ul>";
    }
    @endphp
    <br>
  </div>
  @endif
  <div id="anexos">
    @if ($palestra->link)
    Material de apoio <br>
    &#128279;
    <a href="{{$palestra->link}}" target="_blank">{{$palestra->link}}</a>

    @else
    &#128279; Não há material de apoio
    @endif
    <br><br>
  </div>

  @if($user->permission->permission==('user'))
  <div id="inscrito">
    <span>@if ($inscrito == true)
      Você está inscrito neste evento
      @else
      Você não está inscrito neste evento
      @endif</span> <br><br>
  </div>
  @endif

  <div id="palestra_botões">
  @if($user->permission->permission==('admin'))
    <a class="button_edit" id="editar_palestra_botao" href="#" onclick="editar_palestra(this.id,'{{ $palestra->id }}','{{ $palestra->name }}','{{ $palestra->info }}','{{ $palestra->date }}')">Editar</a>

    <!-- Exclusão de palestras desabilitada
    <form action="/palestras/destroy/{{ $palestra->id }}" method="POST">
      @csrf
      @method("DELETE")
      <a class="button_delete" href="#" onclick="let resultado = confirm('Deseja realmente excluir a palestra?');
          if (resultado) {
            this.closest('form').submit();loading('Excluindo palestra');return false;
          };">Excluir</a>
    </form>
        -->
    @endif

    @if($user->permission->permission==('user'))
    @if ($inscrito == false)
    <form action="/palestras/join/{{ $palestra->id }}" method="POST">
      @csrf
      <a class="button_join" href="#" onclick="this.closest('form').submit();loading('Confirmando presença')">Entrar</a>
    </form>

    @else
    <form action="/palestras/leave/{{ $palestra->id }}" method="POST">
      @csrf
      @method("DELETE")
      <a class="button_leave" href="#" onclick="
            this.closest('form').submit();loading('Confirmando saída');return false; ">Sair</a>
    </form>
    @endif
    @endif
  </div>
</div>
