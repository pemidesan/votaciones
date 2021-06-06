@extends('layout.main-layout')
@section('page-title','Lanzar Votación')
@section('content-area')
    @livewire('App\Http\Livewire\LWEnviarEncuesta', ['encuesta_id'=>$encuesta_id])      
@endsection