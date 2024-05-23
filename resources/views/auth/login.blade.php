@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card login-card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mt-3">
                            {{-- LOGO --}}
                            <div class="col-md-12 text-center">
                                <img src="{{ asset('imgs/logo.png') }}" alt="logo" class="img-fluid w-75">
                            </div>
                        </div>

                        <div class="row mb-5 mt-3">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('email') }}</label> --}}

                            <div class="col-md-12 text-center">
                                <input id="email" type="text" placeholder="Email" class="input-login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 mt-3">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> --}}

                            <div class="col-md-12 text-center">
                                <input id="password" type="password" placeholder="Senha" class="input-login @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 text-center mt-5">
                                <button type="submit" class="btn submit-btn mb-3">
                                    {{ __('Entrar') }}
                                </button>
                                
                                <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu sua senha?') }}
                                </a>
                                <a class="btn btn-link text-dark" href="{{ route('register') }}">
                                    {{ __('Não possui conta?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
