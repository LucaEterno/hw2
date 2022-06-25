@extends('layout')

@section('title', 'Home')

@section('head')
@parent
    <link rel='stylesheet' href="{{ url('style/home.css') }}">
    <script src="{{ url('scripts/home.js') }}" defer></script>
@endsection

@section('content')
    <main>
        <div class='column'>
            <h1>Eventi in programma: 
                <select name='filter' id='filter'>
                    <option value='Tutti' selected>Tutti</option>
                    <option value='Followed'>Followed</option>
                    <option value='Evento sociale'>Eventi sociale</option>
                    <option value='Evento musicale'>Eventi musicale</option>
                    <option value='Spettacolo'>Spettacoli</option>
                    <option value='Evento sportivo'>Eventi sportivo</option>
                    <option value='Conferenza'>Conferenze</option>
                </select>
            </h1>
            <div class='futuri'>

            </div>
        </div>
        <div class='column'>
            <h1>Eventi passati:</h1>
            <div class='passati'>
            
            </div>
        </div>
    </main>

    <section class="infoMod">
        <div class='infobox'>
            
        </div>
    </section> 
@endsection