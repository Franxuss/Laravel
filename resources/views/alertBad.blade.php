@extends('app')
@section('title', 'Alert de prueba')
@section('content')
    @component('components/alert', ['type' => 'danger'])
        <p>Ha ocurrido un error</p>
    @endcomponent
@endsection
