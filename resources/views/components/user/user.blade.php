<div class="styled_active" id="table_container">
  <div id="table_group">
    <table>
      <tr>
        <td colspan="2" id="table_title">{{$user->name}}</td>
      </tr>
      <tr>
        <td>Email</td>
        <td> {{$user->email}}</td>
      </tr>
      <tr>
        <td>Endereço</td>
        <td> {{$user->address}}</td>
      </tr>
      <tr>
        <td>Telefone</td>
        <td> {{$user->phone_number}}</td>
      </tr>
      @if (count($manypalestras) > 0)
      <tr>
        <td colspan="2" id="table_title">Palestras Inscritas</td>
      </tr>
      @foreach($manypalestras as $palestra)
      <tr id="border_palestra">
        <td>Palestra</td>
        <td>{{$palestra->name}}</td>
      </tr>
      @endforeach
      @endif
      <tr id="table_title">
        <td colspan="2">Permissão: {{$user->permission->role}}</td>
      </tr>
    </table>
    <br>

    @if($currentUser->permission->role=="Administrador")
    @if($user->permission->role=="Usuário")
    <form action="{{ route('permission', [$user->id])}}" method="POST" onsubmit="loading('Promovendo usuário para profissional')">
      @csrf
      <input type="hidden" name="role" value="Profissional">

      <button type="submit" class="button_profissional"> Promover para Profissional</button>
    </form>

    @endif
    @if($user->permission->role=="Profissional")
    <form action="{{ route('permission', [$user->id])}}" method="POST" onsubmit="loading('Rebaixando profissional para usuário')">
      @csrf
      <input type="hidden" name="role" value="Usuário">

      <button type="submit" class="button_user"> Rebaixar para Usuário</button>
    </form>
    @endif
    @endif

    @if($currentUser->permission->role=="Profissional")
    @if($user->permission->role=="Usuário")
    <div class="styled_input">
      <form action="{{ route('consultaStore', [$user->id])}}" method="POST" onsubmit="loading('Cadastrando informações da consulta')">
        @csrf        
        <input type="hidden" name="profissional" value="{{$currentUser->name}}">

        <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i"); ?>">
        
        <textarea class="styled_warning" name="consulta" cols="46" rows="5" placeholder="Registrar dados da consulta"></textarea>

        <hr>

        <input class="styled_warning" type="url" name="link" placeholder="Link para material de apoio"></input>

        <button type="submit" class="styled_warning"> &#129122;</button>
      </form>
    </div>
    @endif
    @endif
  </div>
</div>