@extends("layouts.main")

@section("title","Cursos")

@section("corpo")
<x-palestras.palestras_title />

<x-palestras.form_criar_palestras />

<x-palestras.form_pesquisar_palestras />
@endsection