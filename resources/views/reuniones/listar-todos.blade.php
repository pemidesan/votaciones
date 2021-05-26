@extends('layout.main-layout')
@section('page-title','Comunidades')
@section('content-area')
    @livewire('App\Http\Livewire\LWReunion', ['comunidades'=>$comunidades])
@endsection