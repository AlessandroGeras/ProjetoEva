<html>
<div id="palestras_title" class="no_margin inline-block w-full">
    {{$slot}}
    <div class="w-[450px] h-24 mx-auto my-6 lecture dark:lectureDarkmode">
        <div class="h4 text-center dark:text-[#505739]">Palestras</div>
        <div class="styled_input dark:styled_inputDarkmode">
            <form action="{{route('lectures')}}" method="GET" onsubmit="loading('Pesquisando palestras')">
                @csrf
                <input class="styled_warning dark:styled_warningDarkmode" type="text" name="search" placeholder="Digite o nome da palestra"></input>
                <button type="submit" class="styled_warning"> &#129122;</button>
            </form>
        </div>
    </div>
</div>
</html>