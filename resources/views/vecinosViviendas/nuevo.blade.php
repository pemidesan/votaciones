@extends('layout.main-layout')
@section('page-title','Asignar vivienda')
@section('content-area')
@livewire('App\Http\Livewire\LwCrearVecinoVivienda',['vecino_id'=>$vecino_id])
@endsection