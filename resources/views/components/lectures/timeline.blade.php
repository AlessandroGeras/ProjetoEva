<html>
<!--Conteiner geral da timeline-->  
<div id="main_container_timeline" class="overflow-auto h-[500px] mt-2">

  @if (count($lectures) == 0)
  <div class="relative w-full text-center text-black">
    @if($search)
    Não foi encontrada nenhuma palestra com a palavra "{{$search}}"
    @else
    Não foi encontrada nenhuma palestra!
    @endif
  </div>
  @endif

  <!--Conteiner da timeline-->
  <div class="relative max-w-[1200px] mx-auto after:content-[''] after:absolute after:w-[0.1px] after:bg-gray-400 after:top-0 after:bottom-0 after:ml-0 after:-left-[10px] after:dark:bg-gray-600 sm:after:left-[50%]">

    @if (count($lectures) > 0)
    @php
    $count=0;
    $color=0;
    @endphp

    @foreach($lectures as $lecture)

    @php
    $time = strtotime("$lecture->date");
    $day = date('d', $time);
    $month = date('n', $time);
    $month_pt_BR = $months[$month];
    @endphp

    <!--
    ***Lógica da Timeline***

    A timeline é formada por um looping de 4 iterações que se repete se for necessário para alocar os container de informação ao lado esquerdo da timeline ou ao lado direito. O objetivo é simplesmente estético para gerar 4 cores diferentes, duas para cada lado. Existem um contador, funções de par e impar e switchs para realizar a lógica de posicionamento. Números pares são alocados do lado esquerdo e o resto do lado direito
    -->
    @if($count%2==0)

    @switch($color)
    @case(0)
    <div class="timeline timeline_left parent_color0 dark:parent_color0_darkmode" onclick="window.location = '/lectures/{{$lecture->id}}'">
      <div class="relative rounded-none pt-0.5">
        @break

        @case(2)
        <div class="timeline timeline_left parent_color2 dark:parent_color2_darkmode" onclick="window.location = '/lectures/{{$lecture->id}}'">
          <div class="relative rounded-none pt-0.5">
            @break
            @endswitch

            <div class="flex text-white dark:text-gray-200">
              <div class="day relative h6 -top-[6px] pt-1 px-1 sm:text-lg lg:text-xl lg:left-[13.5px]">{{ $day}}</div>
              <div class="h6 relative -top-[3px] -left-[10px] font-mono py-2 pl-4 sm:text-base lg:left-[5px] lg:text-xl">{{ $month_pt_BR }}</div>
              <div class="relative font-poiret text-sm top-[3.5px] left-[5px] sm:text-base sm:top-[5px] lg:text-xl lg:py-2 lg:pl-4 lg:-top-[4px] lg:left-[5px]">{{ $lecture['name'] }}</div>
            </div>
            <div class="h6 bg-white text-justify text-black py-2.5 px-3.5 sm:text-sm lg:text-base dark:bg-gray-800 dark:text-gray-500">
              {{ $lecture['info'] }}
            </div>
          </div>
          @php
          $count++;
          $color++;
          @endphp
        </div>

        @else

        @switch($color)
        @case(1)
        <div class="timeline timeline_right parent_color1 dark:parent_color1_darkmode" onclick="window.location = '/lectures/{{$lecture->id}}'">
          <div class="relative rounded-none pt-0.5">
            @break

            @case(3)
            <div class="timeline timeline_right parent_color3 dark:parent_color3_darkmode" onclick="window.location = '/lectures/{{$lecture->id}}'">
              <div class="relative rounded-none pt-0.5">
                @break
                @endswitch

            <div class="flex text-white dark:text-gray-200">
              <div class="day relative h6 -top-[6px] pt-1 px-1 sm:text-lg lg:text-xl lg:left-[13.5px]">{{ $day}}</div>
              <div class="h6 relative -top-[3px] -left-[10px] font-mono py-2 pl-4 sm:text-base lg:left-[5px] lg:text-xl">{{ $month_pt_BR }}</div>
              <div class="relative font-poiret text-sm top-[3.5px] left-[5px] sm:text-base sm:top-[5px] lg:text-xl lg:py-2 lg:pl-4 lg:-top-[4px] lg:left-[5px]">{{ $lecture['name'] }}</div>
            </div>
            <div class="h6 bg-white text-justify text-black py-2.5 px-3.5 sm:text-sm lg:text-base dark:bg-gray-800 dark:text-gray-500">
              {{ $lecture['info'] }}
            </div>
          </div>
              @php
              $count++;
              $color++;
              @endphp
            </div>

            @php
            if($color>3){
            $color=0;
            }
            @endphp

            @endif
            @endforeach
            @endif

          </div>
        </div>

</html>