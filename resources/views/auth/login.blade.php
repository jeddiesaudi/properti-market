<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Sabar Ganda Property</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css"> {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet">

</head>

<body class="grayme">

    <div class="column is-full colorbar">
        {{-- top color bar goes here --}}
    </div>
    <br>
    <div class="columns fulllogin is-centered">
        <div class="column is-two-thirds leftsideeffect">
            <a href="/">
                <figure class="image is-blacklogo">
                    <img src="img/logoblack.png" width="112" height="28">
                </figure>
            </a>
            <div class="is-mobile textboxlogin">
                <p class="title has-text-primary is-4 has-text-centered">Login Akun Staf Properti</p>
                <p class="subtitle  has-text-centered is-size-7 tinytextlogin">Masukkan email dan kata sandi Anda untuk masuk ke akun admin properti.</p>
            </div>
            <div class="loginform">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input
                                class="input {{ $errors->has('email') ? ' is-danger' : '' }} is-primary inputline is-medium"
                                id="email" type="email" value="{{ old('email') }}" name="email" placeholder="Masukkan Email"
                                autofocus>
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span> @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="has-text-danger">{{ $errors->first('email') }}</strong>
                            </span> @endif
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input
                                class="input {{ $errors->has('password') ? ' is-danger' : '' }} is-primary inputline is-medium"
                                id="password" type="password" name="password" placeholder="Masukkan Password" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span> @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong class="has-text-danger">{{ $errors->first('password') }}</strong>
                            </span> @endif
                        </p>
                    </div>
    <div class="field ">
        <p class="control has-text-centered is-centered loginbutton">
            <button class="button is-primary is full is-uppercase">
                &nbsp; &nbsp; &nbsp; &nbsp; Login &nbsp; &nbsp; &nbsp; &nbsp;
            </button>
        </p>
    </div>
    </form>
    @if(session()->has('message'))
            <div class="">
                <h1 class="is-size-7 has-text-weight-bold has-text-danger"><b> {{ session()->get('message') }}</b></h1>
            </div>
            @endif
    </div>
    </div>
    </div>


    {{-- Footer --}}
    @include('layouts.footer') {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>
