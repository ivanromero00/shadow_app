@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="jumbotron col-md-7 pcolor pt-4 pb-3">
            <h1 class="display-4">Bienvenido a Shadow!</h1>
            <p class="h3 my-3">Shadow le permite trabajar de forma más colaborativa y ser más productivo gracias a nuestras notas y sistema de gestión.</p>
            <p class="h5">Las notas, tableros y grupos de Shadow le permiten organizar y priorizar sus proyectos e ideas de forma eficiente, flexible y provechosa.</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header pcolor">{{ __('Login') }}</div>

                <div class="card-body py-2">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mt-1 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 my-auto">
            <p class="h1 mb-3 mt-auto">Trabaje desde cualquier lado y con cualquier equipo</p>
            <p class="h4 mb-3">Ya sea para un trabajo, un proyecto, la lista de la compra o incluso las próximas vacaciones en familia, Shadow os ayudará a tu equipo y a ti a permanecer organizado.</p>
        </div>
        <div class="col-md-6">
            <img class="img-fluid" alt="Responsive image" src="{{ asset('img/notas_login.jpg') }}" alt="notas">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 text-center">
            <img class="img-fluid" alt="Responsive image" src="{{ asset('img/ejemplo.png') }}" alt="notas">
        </div>
        <div class="col-md-6 my-auto">
            <p class="h1 mb-3 mt-auto">Mira toda la información de un vistazo</p>
            <p class="h4 mb-3">Profundice en los detalles de las notas añadiendo fotos, descripciones o comentarios. Colabore en los proyectos de principio a fin.</p>
        </div>
    </div>
    <div class="row mt-3 mb-4 text-center">
        <div class="col-md-6 m-auto">
            <p class="h1 mb-3 mt-auto">Empieza a planificar todo</p>
            <p class="h4 mb-3">Regístrese y empiece a utilizar Shadow para hacer más y mejor las cosas.</p>
            <a class="btn btn-primary" href="{{ route('register') }}">Registrese ya aquí</a>
        </div>
    </div>
</div>
<div class="container-fluid mt-4 py-4 text-center pcolor">
    <p class="col-md-12">© Copyright 2020. Todos los derechos reservados hacia Iván Romero Reyna. </p>
</div>
@endsection
