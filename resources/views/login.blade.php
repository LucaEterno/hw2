<html>
    <head>
        <title>Ewind - Login</title>

        <link rel='stylesheet' href="{{ url('style/login_signup.css') }}">
        <link rel="icon" type="image/png" href="{{ url('assets/e.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
    </head>

    <body class="login">
        <main class="login">

        <div class="logo_esterno">
            <div class="logo_interno">
                <img src="{{ url('assets/ee.png') }}"/>
            </div>
        </div>

        <section>
            <h1>ACCEDI</h1>

            @if($error == 'empty_fields')
            <span class='error'>Compilare tutti i campi.</span>
            @elseif($error == 'wrong')
            <span class='error'>Username/password errati.</span>
            @endif

            <form name='login' method='post'>
            @csrf
                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' id='username' value='{{ old("username") }}'></div>
                </div>

                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password' id='password' value='{{ old("password") }}'></div>
                </div>

                <div>
                    <input type='submit' value="Accedi">
                </div>
            </form>
            
            <div class="signup">Non hai ancora un account? <a href="{{ url('register') }}">Registrati</a></div>

        </section>
        </main>
    </body>
</html>