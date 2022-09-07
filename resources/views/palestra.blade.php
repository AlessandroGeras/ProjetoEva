@extends("layouts.main")

@section("title","Palestra")

@section("corpo")

{{-- Formatação de data do componente palestra_nome --}}
@php
$time = strtotime("$palestra->date");
$day = date('d', $time);
$month = date('n', $time);
$month = $months[$month];
$hours = date('H', $time);
$minutes = date('i', $time);
$inscrito = false;
$inscritos = 0;
@endphp

{{-- Validação de cadastro no evento --}}
@isset($manypalestras)
@foreach($manypalestras as $speech)
@if(($speech->id)==($palestra->id))
@php
$inscrito = true;
@endphp
@endif
@endforeach
@endisset

{{-- Exibir total de inscritos --}}
@isset($manyusers)
@foreach($manyusers as $user)
@php
$inscritos++;
@endphp
@endforeach
@endisset
<x-palestra.palestra_nome :palestra="$palestra" :day="$day" :month="$month" :hours="$hours" :minutes="$minutes"/>

<x-palestra.palestra_info :palestra="$palestra" />
@endsection
