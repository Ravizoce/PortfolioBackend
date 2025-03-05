@extends('layouts.base')
@section('contents')
    <x-admin.index pageTitle="Profile" addRoute="profile.create"/>
    {{$profile}}
@endsection
