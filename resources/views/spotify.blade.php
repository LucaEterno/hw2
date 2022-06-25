@extends('layout')

@section('title', 'Spotify')

@section('head')
@parent
    <script>
        const csrf_token = '{{ csrf_token() }}';
    </script>
    <link rel='stylesheet' href="{{ url('style/spotify.css') }}">
    <script src="{{ url('scripts/spotify.js') }}" defer></script>
@endsection

@section('content')
    <main class='api'>
        <div class='contenitor'>
            <h2>Spotify</h2>
            <div>
                <form>
                @csrf
                    <div><input type='text' name='track' id='track'></div>
                    <div><input type='submit' value="Cerca"></div>
                </form>
                <input type='button' id='playlist' value='Ewind Playlist'>
            </div>
        </div>
    </main>

    <section class="playlistMod">
    </section> 

    <section class="trackMod">
        <div class='box'></div>
        <div>
            <input type='button' id='aggiungi' value='Aggiungi ai preferiti' class='hide'>
            <input type='button' id='rimuovi' value='Rimuovi dai preferiti' class='hide'>
            <input type='button' id='close' value='Chiudi'>
        </div>
    </section> 
@endsection