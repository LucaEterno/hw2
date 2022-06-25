@extends('layout')

@section('title', 'Add event')

@section('head')
@parent
    <link rel='stylesheet' href="{{ url('style/add_event.css') }}">
@endsection

@section('content')
    <main>
        <section>
            <h1>Aggiungi evento:</h1>
            <div>
                @if($error == 'empty_fields')
                <span class='error'>Riempire tutti i campi.</span>
                @elseif($error == 'past')
                <span class='error'>Non puoi tornare indietro nel tempo, inserire data valida.</span>
                @elseif($error == 'future')
                <span class='error'>Programma il tuo evento entro un anno, inserire data valida.</span>
                @endif

                <form name='event' method='post'>
                @csrf
                    <div><label for='type'>Tipologia evento:</label></div>
                    <div>
                        <select name='type' id='type'>
                            <option value='Evento sociale' selected>Evento sociale</option>
                            <option value='Evento musicale' @if (old('type') == 'Evento musicale') {{ 'selected' }} @endif>Evento musicale</option>
                            <option value='Spettacolo' @if (old('type') == 'Spettacolo') {{ 'selected' }} @endif>Spettacolo</option>
                            <option value='Evento sportivo' @if (old('type') == 'Evento sportivo') {{ 'selected' }} @endif>Evento sportivo</option>
                            <option value='Conferenza' @if (old('type') == 'Conferenza') {{ 'selected' }} @endif>Conferenza</option>
                        </select>
                    </div>
                        
                    <div><label for='descr'>Descrizione dell'evento:</label></div>
                    <div><input type='text' name='descr' id='descr' value='{{ old("descr") }}'></div>

                    <div><label for='data'>Data: </label></div>
                    <div><input type='date' name='data' id='data' value='{{ old("data") }}'></div>

                    <div><input type='submit' value="Aggiungi evento" id="submit"> </div>
                </form>
            </div>
        </section>
    </main>
@endsection