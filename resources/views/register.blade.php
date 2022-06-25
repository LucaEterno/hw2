<html>
    <head>
        <title>Ewind - Signup</title>
        
        <link rel='stylesheet' href="{{ url('style/login_signup.css') }}">
        <script src="{{ url('scripts/signup.js') }}" defer></script>

        <script>
            const BASE_URL = "{{ url('/') }}/";
        </script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ url('assets/e.png') }}">
        <meta charset="utf-8">
    </head>

    <body class="signup">
        <main>

        <div class="logo_esterno">
            <div class="logo_interno">
                <img src="{{ url('assets/ee.png') }}"/>
            </div>
        </div>

        <section>
            <h1>REGISTRATI</h1>

            @if($error == 'empty_fields')
            <span class='error'>Compilare tutti i campi.</span>
            @elseif($error == 'valid_username')
            <span class='error'>Inserire nome utente valido.</span>
            @elseif($error == 'existing_username')
            <span class='error'>Nome utente già utilizzato.</span>
            @elseif($error == 'valid_email')
            <span class='error'>Inserire email valida.</span>
            @elseif($error == 'existing_email')
            <span class='error'>Email già utilizzata.</span>
            @elseif($error == 'short_password')
            <span class='error'>Password troppo corta.</span>
            @elseif($error == 'valid_password')
            <span class='error'>Password non valida.</span>
            @elseif($error == 'valid_confirm')
            <span class='error'>Le password non corrispondono.</span>
            @endif

            <form name='signup' method='post'>
            @csrf
                <div class="username">
                    <div><label for='username'>Nome utente</label></div>
                    <div><input type='text' name='username' id='username' value='{{ old("username") }}'></div>
                    <span>Nome utente già utilizzato</span>
                </div>

                <div class="type"> 
                    <div><label for='type'>Tipologia account</label></div>
                    <select name='type' id='type'>
                        <option value='privato' selected>Utente privato</option>
                        <option value='gruppo' @if (old('type') == 'gruppo') {{ 'selected' }} @endif>Gruppo</option>
                        <option value='azienda' @if (old('type') == 'azienda') {{ 'selected' }} @endif>Azienda</option>
                        <option value='istruzione' @if (old('type') == 'istruzione') {{ 'selected' }} @endif>Ente scolastico</option>   
                    </select>
                </div>

                <div class="email">
                    <div><label for='email'>Email</label></div>
                    <div><input type='text' name='email' id='email' value='{{ old("email") }}'></div>
                    <span>Email non valida</span>
                </div>

                <div class="password">
                    <div><label for='password'>Password</label></div>
                    <div><input type='password' name='password'id='password' value='{{ old("password") }}'></div>
                    <span>Inserisci almeno 8 caratteri</span>
                </div>

                <div class="confirm_password">
                    <div><label for='confirm_password'>Conferma Password</label></div>
                    <div><input type='password' name='confirm_password' id='confirm_password' value='{{ old("confirm_password") }}'></div>
                    <span>Le password non coincidono</span>
                </div>

                <div class="profilepicture">
                    <div><label for='rpicture'>Scegli un'immagine profilo</label></div>
                    <div class="choice-grid">
                        <div>
                            <img src="{{ url('images/image1.jpg') }}"/>
                            <input type='radio' name='rpicture' value='images/image1.jpg' checked>
                        </div>
                        <div>  
                            <img src="{{ url('images/image2.jpg') }}"/>
                            <input type='radio' name='rpicture' value='images/image2.jpg' @if (old('rpicture') == 'images/image2.jpg') {{ 'checked' }} @endif>
                        </div>
                        <div>
                            <img src="{{ url('images/image3.jpg') }}"/>
                            <input type='radio' name='rpicture' value='images/image3.jpg' @if (old('rpicture') == 'images/image3.jpg') {{ 'checked' }} @endif>
                        </div>
                        <div>  
                            <img src="{{ url('images/image4.jpg') }}"/>
                            <input type='radio' name='rpicture' value='images/image4.jpg' @if (old('rpicture') == 'images/image4.jpg') {{ 'checked' }} @endif>
                        </div>
                    </div>
                </div>

                <div class="submit">
                    <input type='submit' value="Registrati" id="submit" disabled>
                </div>

            </form>

            <div class="signup">Hai già un account? <a href="{{ url('login') }}">Accedi</a>

        </section>
        </main>
    </body>
</html>