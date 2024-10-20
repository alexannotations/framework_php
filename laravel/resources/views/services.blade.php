@extends('layouts.elanding')

@section('title','Services page')


@section('content')

    <h1>Servicios</h1>
    {{-- componentes (llamamos a la tarjeta) --}}
    @component('_components.card')

        {{-- component -> slot --}}
        @slot('title', 'Service 1')
        @slot('content', 'Lorem ipsum dolor set aimer')

        @slot('contenthtml')
        <h3></h3>
        <p></p>
        @endslot
        
    @endcomponent

@endsection