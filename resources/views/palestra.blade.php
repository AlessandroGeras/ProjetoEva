@extends("layouts.main")

@section("title","Palestra")

@section("corpo")

@php
$time = strtotime("$palestra->date");
$day = date('d', $time);
$month = date('n', $time);
$month = $months[$month];
$hours = date('H', $time);
$minutes = date('i', $time);
$inscrito = false;
@endphp

@isset($manypalestras)
@foreach($manypalestras as $speech)
@if(($speech->id)==($palestra->id))
@php
$inscrito = true;
@endphp
@endif
@endforeach
@endisset

<x-palestra.palestra_nome :palestra="$palestra" :day="$day" :month="$month" :hours="$hours" :minutes="$minutes"/>

<x-palestra.palestra_info :palestra="$palestra" />

<x-palestra.palestra_actions :palestra="$palestra" :inscrito="$inscrito" :manyusers="$manyusers" />

<x-palestra.form_editar_palestra />
@endsection