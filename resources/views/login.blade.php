@extends('layout.mainlayout')

@section('title', 'Login')

@section('content')

@if($errors->any())
    <div id="login_erro" class="fixed top-0 left-0 right-0 bg-red-500 text-red py-2 text-center">{{ implode('', $errors->all(':message')) }}</div>
@endif


    @component("components.login_form")
    @endcomponent

@endsection