<?php date_default_timezone_set('America/Sao_Paulo'); ?>

<h2 id="admin_panel">Painel Administrativo</h2>
<div class="admin_container">
  <div class="admin_button" onclick="warning();">Aviso Geral - Página Inicial</div>
</div>

<div id="warning_styled_input_container">
  <div class="styled_input">
    <form action="{{route('warning')}}" method="POST">
      @csrf
      <input class="styled_warning" type="text" name="warning" placeholder="Digite o aviso geral"></input>
      <button type="submit" class="styled_warning" onclick="loading('Criando aviso geral')"> &#129122;</button>
      <div id="warning_date_container">
        <input type="datetime-local" name="date" value="<?php echo date("Y-m-d H:i"); ?>" min="<?php echo date('Y-m-d\TH:i') ?>">
      </div>
    </form>
  </div>

  <div class="styled_active">
    @if(count($warning)>0)
    <br>
    <span>Aviso Geral Ativo<span><br>
    @foreach($warning as $aviso)

    <div class="styled_input">
    <form action="{{ route('warningDestroy', [$aviso->id])}}" method="POST">
      @csrf
      @method("DELETE")
      <input class="styled_warning" type="text" name="warning" value="{{$aviso->warning}}" readonly></input>
      <button type="submit" class="styled_warning" onclick="loading('Apagando aviso geral')"> &#x2715;</button>      
    </form>
    </div>

    @endforeach
    @endif
  </div>
</div>
