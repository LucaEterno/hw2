@extends('layout')

@section('title', 'Preferiti')

@section('head')
@parent
    <link rel='stylesheet' href="{{ url('style/preferiti.css') }}">
    <script src="{{ url('scripts/preferiti.js') }}" defer></script>
@endsection

@section('content')
    <main>
        <div class='column'>
            <h1>I tuoi brani preferiti:</h1>
            <div class='preferiti'>

            </div>
        </div>
    </main>
@endsection