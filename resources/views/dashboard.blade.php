@extends("layouts.main")

@section("title","Minha Conta")

@section("corpo")
<x-dashboard.my_account :user="$user" />

@switch($user->permission->role)
@case('Usuário')
<x-dashboard.my_events :manypalestras="$manypalestras" />
<x-dashboard.consultas :manyconsultas="$manyconsultas"/>
@break

@case('Profissional')
<x-dashboard.admin_palestras :palestras="$palestras" />
@break

@case('Administrador')
<x-dashboard.admin_palestras :palestras="$palestras" />
@break
@endswitch

@endsection
