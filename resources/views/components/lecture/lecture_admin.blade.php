{{--Mostrar total de usuários inscritos na palestra e quem são--}}
@php
$subscripts = 0;
$users="<br>";

foreach($manyusers as $userJoined){
$route=route('user', $userJoined['id']);
$subscripts++;
if($subscripts%2==0){
$users=$users."<a class='no-underline text-black dark:text-gray-200' href='$route'>
  <li class='bg-[#00000026] dark:bg-gray-800'>".$userJoined['name']."</li>
</a>";
}
else{
$users=$users."<a class='no-underline text-black dark:text-gray-200' href='$route'>
  <li class='bg-[#0000000d] dark:bg-gray-700'>".$userJoined['name']."</li>
</a>";
}
}
@endphp

<div class="mx-auto text-xl text-center sm:w-[300px] dark:text-gray-200">
  <div class="text-base mx-auto lg:text-lg">Inscritos <br>
    &#128101; {{$subscripts}}<br>
    <ul>
      @php
      if($subscripts>0){
      echo $users."</ul>";
    }
    else{
    echo "</ul>";
    }
    @endphp
    <br>
  </div>

  {{$slot}}

  {{--Mostrar botão Editar Palestra--}}
  <div class="flex w-48 justify-around mt-2.5 mb-5 mx-auto">
    <a class="button_edit" href="#" onclick="edit_lecture('{{ $lecture->name }}','{{ $lecture->info }}','{{ $lecture->date }}')">Editar</a>

    <!-- Exclusão de palestras desabilitada
    <form action="/palestras/destroy/{{ $lecture->id }}" method="POST">
      @csrf
      @method("DELETE")
      <a class="button_delete" href="#" onclick="let resultado = confirm('Deseja realmente excluir a palestra?');
          if (resultado) {
            this.closest('form').submit();loading('Excluindo palestra');return false;
          };">Excluir</a>
    </form>
    -->
  </div>
</div>