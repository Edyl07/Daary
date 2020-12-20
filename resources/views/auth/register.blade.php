@extends('frontend.layouts.app')

@section('styles')
{{--  <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}"/>
<style>
    label#country-placeholder{
        padding: 0 0 0 50px !important;
    }
</style>  --}}
@endsection

@section('content')

<div class="row">
    <div class="col s12 m6 offset-m3">
        <div class="card">
            <h4 class="center light-green-text uppercase p-t-30">{{ __('S\'inscrire') }}</h4>

            <div class="p-20">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="name">{{ __('Nom') }}</label>
                            <input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                                name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="name">{{ __("Nom d'utilisateur") }}</label>
                            <input id="name" type="text" class="{{ $errors->has('username') ? 'is-invalid' : '' }}"
                                name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="email">{{ __('Adresse E-Mail') }}</label>
                            <input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                                name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="phone_number" >{{ __('Numéro de Téléphone') }}</label>
                            <input id="phone_number" type="tel" class="{{ $errors->has('phone_number') ? 'is-invalid' : '' }}"
                                name="phone_number" value="{{ old('phone_number') }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('name') }}</strong>
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

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="password-confirm">{{ __('Confirmation de mot de passe') }}</label>
                            <input id="password-confirm" type="password" name="password_confirmation" required>
                        </div>
                    </div>

                    <p>
                        <label>
                            <input type="checkbox" name="agent" class="filled-in" />
                            <span>{{ __('Registration as Agent') }}</span>
                        </label>
                    </p>

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn light-green darken-4">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    <div class="row">
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
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
    {{--  <script src="{{ asset('js/intlTelInput.js') }}"></script>
    <script>
        var input = document.querySelector("#phone_number");
        window.intlTelInput(input, {
            hiddenInput: "phone_number",
            preferredCountries: ["us", "gb", "co", "de"],
            utilsScript: "{{ asset('js/utils.js') }}"
        });
    </script>  --}}
@endsection