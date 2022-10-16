{{--Formulário de cadastro de consulta para Profissionais--}}

<style>
textarea::placeholder {
        color: #505739;
    }
</style>

@if($user->permission->role=="User")
  <div class="styled_input dark:styled_input_darkmode">
    <form action="{{ route('appointment-store', [$user->id])}}" method="POST" onsubmit="loading('Cadastrando informações da consulta')">
      @csrf
      <input type="hidden" name="professional" value="{{$currentUser->name}}">

      <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i"); ?>">

      <textarea class="styled_warning dark:text-gray-200" name="appointment" cols="46" rows="5" placeholder="Registrar dados da consulta"></textarea>

      <hr>

      <input class="styled_warning dark:text-gray-200" type="url" name="link" placeholder="Link para material de apoio"></input>

      <button type="submit" class="styled_warning"> &#129122;</button>
    </form>
  </div>
  @endif