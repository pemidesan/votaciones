@extends('layout.main-layout')
@section('page-title','Nueva Votación')
@section('content-area')
    @livewire('App\Http\Livewire\LWOpcionesEncuesta', ['reunion_id'=>$reunion_id,'nombreReunion'=>$nombreReunion,'admins'=>$admins])      
@endsection