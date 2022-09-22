@extends("layouts.main")

@section("title","Usuário")

@section("corpo")
<x-user.user :currentUser="$currentUser" :user="$user" :manypalestras="$manypalestras" />

@if($currentUser->permission->role=="Profissional")
<x-user.consultas_profissional :currentUser="$currentUser" :user="$user" :manyconsultas="$manyconsultas" />
@endif
@endsection