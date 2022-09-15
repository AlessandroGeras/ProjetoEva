@extends("layouts.main")

@section("title","Minha Conta")

@section("corpo")
<x-dashboard.my_account :user="$user" />

@if($user->permission->permission==('Usuário'))
<x-dashboard.my_events :manypalestras="$manypalestras" />

<x-dashboard.notifications/>
@endif

@endsection