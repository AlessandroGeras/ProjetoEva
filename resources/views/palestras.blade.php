@extends("layouts.main")

@section("title","Palestras")

@section("corpo")
<x-palestras.palestras_title />

<x-palestras.form_criar_palestras />

<x-palestras.form_pesquisar_palestras />

<x-palestras.timeline :palestras="$palestras" :months="$months" :search="$search"/>
@endsection