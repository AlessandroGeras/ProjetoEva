<div class="mx-auto text-sm mx-auto text-center lg:text-lg dark:text-gray-200">
    @if ($lecture->link)
    Material de apoio <br>
    &#128279;
    <a class="text-black" href="{{$lecture->link}}" target="_blank">{{$lecture->link}}</a>

    @else
    &#128279; Não há material de apoio
    @endif
    <br><br>
</div>