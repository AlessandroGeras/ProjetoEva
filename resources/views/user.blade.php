@extends("layouts.main")

@section("title","Usuário")

@section("corpo")
<x-user.user :user="$user" :manylectures="$manylectures">
    <x-navbar.darkmode />
</x-user.user>

@if($currentUser->permission->role=="Administrator")
<x-user.administrator :user="$user" />
@endif

@if($currentUser->permission->role=="Professional")
<x-user.consultas_profissional :currentUser="$currentUser" :user="$user" :manyappointments="$manyappointments" />
@endif
@endsection