<html>
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

  <div class="relative max-w-[1200px] mx-auto after:content-[''] after:absolute after:w-[0.1px] after:bg-gray-400 after:top-0 after:bottom-0 after:left-[50%] after:ml-0 after:dark:bg-gray-600">

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
              <div class="day h4 relative -top-[6px] left-[13.5px] pt-1 px-1">{{ $day}}</div>
              <div class="text-xl relative -top-[3px] left-[5px] font-mono py-2 pl-4">{{ $month_pt_BR }}</div>
              <div class="text-[22px] relative font-poiret py-2 pl-4 -top-[4px] left-[5px]">{{ $lecture['name'] }}</div>
            </div>
            <div class="bg-white text-justify text-black py-2.5 px-3.5 dark:bg-gray-800 dark:text-gray-500">
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
                  <div class="day h4 relative -top-[6px] left-[13.5px] pt-1 px-1">{{ $day}}</div>
                  <div class="text-xl relative -top-[3px] left-[5px] font-mono py-2 pl-4">{{ $month_pt_BR }}</div>
                  <div class="text-[22px] relative font-poiret py-2 pl-4 -top-[4px] left-[5px]">{{ $lecture['name'] }}</div>
                </div>
                <div class="bg-white text-justify text-black py-2.5 px-3.5 dark:bg-gray-800 dark:text-gray-500">
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