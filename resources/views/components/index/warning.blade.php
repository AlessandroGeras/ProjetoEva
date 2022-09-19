@if(count($warning)>0)
<div id="index_warning">
    <h2>~ Aviso Geral ~</h2><br>
    @foreach($warning as $aviso)
    <span>{{$aviso->warning}}</span><br><br>
    @endforeach
    <button id="warning_close" onclick="warning_close()">
        &#x2715;
    </button>
</div>
@endif