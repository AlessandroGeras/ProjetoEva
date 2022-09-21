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
<x-dashboard.criar_palestra />
<x-dashboard.users :user="$user" :users="$users" />
@break

@case('Administrador')
<x-dashboard.admin_palestras :palestras="$palestras" />
<x-dashboard.admin_panel :warning="$warning" />
<x-dashboard.criar_palestra />
<x-dashboard.users :user="$user" :users="$users" />
@break
@endswitch

@endsection