<html>
    <head>
        @section('head')
        <title> Ewind - @yield('title')</title>

        <script>
            const BASE_URL = "{{ url('/') }}/";
        </script>
        <script src="{{ url('scripts/common.js') }}" defer></script>
        <link rel='stylesheet' href="{{ url('style/common.css') }}">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ url('assets/e.png') }}">
        <meta charset="utf-8">
        @show
    </head>

    <body>
        <header>
            <nav>
                <div class="l_nav">
                    <div class="logo" style="background-image: url({{ 'assets/ee.png' }})"></div>
                    <a href="{{ url('home') }}" class="link1">Home</a>
                    <a href="{{ url('add-event') }}" class="link2">Aggiungi evento</a>
                    <a href="{{ url('spotify') }}" class="link3">Spotify</a>
                    <a href="{{ url('preferiti') }}" class="link4">Preferiti</a>
                    <a href="{{ url('logout') }}">Logout</a><br><br>
                </div>

                <div class="hide_nav">
                        <div></div>
                        <div></div>
                        <div></div>
                </div>

                <div class="r_nav">
                        <div class="username">
                            Benvenuto {{ $user['username'] }}
                        </div>

                        <div class="profilo" style="background-image: url({{ $user['propic'] }})">
                        </div>
                </div>
            </nav>
        </header>

        @yield('content')

        <section class="mobileMod">
            <div> DOVE VUOI ANDARE?</div>
            <div><a href="{{ url('home') }}"  class="navlink1">Home</a></div>
            <div><a href="{{ url('add-event') }}" class="navlink2">Aggiungi evento</a></div>
            <div><a href="{{ url('spotify') }}" class="navlink3">Spotify</a></div>
            <div><a href="{{ url('preferiti') }}" class="navlink4">Preferiti</a></div>
            <div><a href="{{ url('logout') }}">Logout</a></div>
        </section> 

        <footer>
            <p> Eterno Luca - Matricola: O46002092 </p>
        </footer>
    </body>
</html>