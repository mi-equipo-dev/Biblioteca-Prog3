@extends('layouts.app')

@section('content')
    @livewire('editar-bibliotecario', ['usuario' => $usuario])
@endsection
