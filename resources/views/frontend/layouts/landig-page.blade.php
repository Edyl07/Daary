<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Daary-Immo') }}</title>

    <!-- Favicons -->
    <link rel="icon" 
      type="image/png" 
      href="{{ asset('daary.png') }}" sizes="180x180">
    {{-- <link rel="apple-touch-icon" href="{{ asset('daary.png') }}" sizes="180x180"> --}}

    @yield('css')
    <style>
        html {
            font-family: 'Signika', sans-serif;
        }

        body {
            font-size: 1em;
            width: 100%;
            margin: 0px;
            padding: 0px;
        }

        /* .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        } */

        .button {
            display: inline-block;
            color: white;
            background-color: #33691e;
            padding: 5px;
            border-radius: 5px;
            text-shadow: 1px 1px 1px grey;
        }

        button.button {
            padding: 11px 20px;
            border: 0;
        }

        /*nav*/
        nav {
            display: block;
            text-align: center
        }

        nav h1 {
            display: inline-block;
            position: relative;
            left: 50px;
        }

        nav .button {
            position: absolute;
            right: 50px;
            top: 0px;
            vertical-align: middle;
        }

        /*nav*/

        /*header*/
        header {
            padding: 30px;
            background: url("{{ asset('saloon.jpg') }}");
            max-width: 100%;
            filter: grayscale(0%);
            background-position: center center;
        }

        #left {
            display: inline-block;
            width: 50%;
            margin-left: 50px;
            vertical-align: middle;
            color: white;
        }

        #left h2 {
            font-size: 2.5em;
            text-shadow: 1px 1px 2px grey;
        }

        header img {
            vertical-align: middle;
            display: inline-block;
            margin-left: 10%;
            width: 25%;
        }

        /*header*/

        /*section*/
        section {
            text-align: center;
            width: 30%;
            margin: 0px auto 0px auto;
        }

        section h5 {
            font-size: 1.5em;
        }

        /*section*/

        /*article*/

        article h5 {
            text-align: center;
            font-size: 1.5em;
            padding-top: 10px;
            margin-top: 10px;
        }

        article div {
            display: inline-block;
            width: 25%;
            margin-left: 50px;
            margin-right: 50px;
            text-align: left;
        }

        .icon {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }

        div h6 {
            display: inline-block;
            vertical-align: middle;
        }

        div p {
            position: relative;
            top: -10px;
        }

        #mobile-landscape {
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 40%;
        }

        /*article*/

        /*aside*/
        aside h5 {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 0px;
        }

        .geral {
            display: inline-block;
            width: 25%;
            margin-left: 50px;
            margin-right: 50px;
        }

        aside img {
            border-radius: 100%;
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }

        .profile {
            display: inline-block;
            vertical-align: middle;
            width: 75%;
            padding: 0px;
        }

        .profile h6 {
            font-size: 1em;
            margin-bottom: 15px;
        }

        .profile p {
            margin-top: 0px;
        }

        /*aside*/

        /*footer*/
        footer {
            background: url("http://orig06.deviantart.net/8ff3/f/2012/198/7/1/fading_colors_by_nxxos-d57kk4d.jpg");
            text-align: center;
        }

        footer h4 {
            padding-top: 10px;
            font-size: 1.5em;
            color: white;
            text-shadow: 1px 1px 1px grey;
            margin-bottom: 10px;
        }

        #links div {
            display: inline-block;
            vertical-align: top;
            width: 20%;
            color: white;
            text-align: left;
        }

        ul {
            padding-left: 0px;
        }

        ul li {
            list-style-position: inside;
            list-style-type: none;
        }

        footer p {
            margin-top: 10px;
            width: 100%;
            color: white;
            padding-top: 10px;
            padding-bottom: 10px;
            text-transform: uppercase;
            background-color: black;
        }

        /*footer*/

    </style>

</head>

<body>


    <nav class="center" style="background-color: white !important">
        <a href="/">
            <img src="{{ asset('daary.png') }}" width="200" height="150" alt="" srcset="">
        </a>
    </nav>

    <header style="background-color: white !important">
        <div id="left">
            <h2>Trouvez la masison de vos rêves.</h2>
            <h4>Joignez les meilleurs agents immobliéres sur les plateformes mobile et devenez proprietare ou locataire
                a votre tour a prix doux dans toute la zone Mauritanienne et tout cela dans un delais minimum </h4>
            {{-- <a href=""><button class="button" style="cursor: pointer"><i
                        class="fab fa-app-store-ios" style="font-size: 15px; margin-right:5px "></i>Télécharger sur App
                    Store</button></a> --}}
            <a
                href="https://play.google.com/store/apps/details?id=com.daary_immo.startup&fbclid=IwAR3ctRNT3sgg3XKQx2QCaAfi0pIeA2oemxtYmzHIjaVAzS4-D3658mw6aeA"><button
                    class="button" style="cursor: pointer"><i class="fab fa-google-play"
                        style="font-size: 15px; margin-right:5px "></i>Télécharger sur Google Play Store</button></a>

        </div>
        <img src="{{ asset('screenshoot.png') }}" alt="Mobile mockup">
        </div>
    </header>

    {{-- <article style="background-color: white !important">
        <h5>Qu'attendez-vous?</h5>
        <div><img
                src="https://cdn1.iconfinder.com/data/icons/freeline/32/account_friend_human_man_member_person_profile_user_users-48.png"
                class="icon">
            <h6>Communité<br>Imombliere</h6>
            <p>Inscrivez-vous un seul click et ajouter un bien ou bien si vous êtes un client qui cherche un bien
                immobiler jettez un coup d'oeil sur le rubrique <span style="color: blue">Accèss à tout le monde</span>
            </p>
        </div>
        <div><img src="https://cdn1.iconfinder.com/data/icons/freeline/32/gps_location_map_marker-48.png" class="icon">
            <h6>Accèss <br> à tout le monde</h6>
            <p>Trouvez rapidement un bien selon votre budget et vos besoins specifique dans la section recherche en
                appuyant sur le boutton recherche a la page d'accueil.</p>
        </div>
        <div><img
                src="https://cdn1.iconfinder.com/data/icons/freeline/32/alarm_alert_clock_event_history_schedule_time_watch-48.png"
                class="icon">
            <h6>Experience <br>Utilisateurs</h6>
            <p>Connectez-vous a votre comptes et beneficiez de toute les fonctionnalitées, discussion avec un agent et
                un client, un systémes de favories, un systéme de comparaison des biens selon le prix , la superficie et
                bien plus encores</p>
        </div>
    </article> --}}

    {{-- MAIN CONTENT --}}

    @yield('content')

    <script src="https://kit.fontawesome.com/c599999fcf.js" crossorigin="anonymous"></script>
    @yield('scripts')
</body>

</html>
