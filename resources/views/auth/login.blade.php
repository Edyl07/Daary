@extends('frontend.layouts.app')

@section('content')

<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card">

            <h4 class="center light-green-text uppercase p-t-30">{{ __('Se Connecter') }}</h4>

            <div class="p-20">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="phone_number">{{ __('Adresse Email Ou Numéro de Téléphone') }}</label>
                            <input id="phone_number" type="text" class="{{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                                name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                            @if ($errors->has('email'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="password">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password"
                                class="{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <p>
                        <label>
                            <input type="checkbox" name="remember" class="filled-in"
                                {{ old('remember') ? 'checked' : '' }} />
                            <span>{{ __('Remember Me') }}</span>
                        </label>
                    </p>

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn light-green darken-4">
                                {{ __('Login') }}
                            </button>

                            <a class="light-green-text p-l-15" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="input-field col s12">
                            <div class="row center">
                                <div class="input-field col s12">
                                    <a class="waves-effect waves-light btn blue darken-4"
                                        href="{{ url('/login/facebook') }}" style="padding : 0 30px"> <i
                                            class="fab fa-facebook-f" style="margin-right: 5px"></i>Facebook</a>

                                    <a class="waves-effect waves-light btn red darken-4"
                                        href="{{ url('/login/google') }}" style="padding: 0 30px"> <i
                                            class="fab fa-google" style="margin-right: 5px;"></i>Google</a>
                                </div>
                            </div>

                        </div>
                    </div> --}}

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://kit.fontawesome.com/c599999fcf.js" crossorigin="anonymous"></script>
@endsection