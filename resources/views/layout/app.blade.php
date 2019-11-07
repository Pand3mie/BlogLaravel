<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ludothèque') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/materialize_lite.css') }}" rel="stylesheet">
    <!-- Script -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <style>
        body {
            margin-bottom: -30px !important;
        }
        #view-source {
          position: fixed;
          display: block;
          right: 0;
          bottom: 0;
          margin-right: 40px;
          margin-bottom: 40px;
          z-index: 900;
        }
        </style>
</head>
<body>
    <div class="fixed-action-btn toolbar direction-top menu-base" style="position: absolute;top:0px; transition: transform 0.2s ease 0s; transform: translate3d(0px, 0px, 0px);">
        <a class="btn-floating btn-large white-game" style="transition: transform 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) 0s; transform: translate3d(0px, 0px, 0px);">
            <i class="large material-icons">play_for_work</i>
        </a>
        <ul>
                <li class="waves-effect waves-light"><a href="#!" style=""><i class="material-icons">face</i> Gestion utilisateur</a></li>
                <li class="waves-effect waves-light"><a href="#!" style=""><i class="material-icons">build</i> Paramètres</a></li>
                <li class="waves-effect waves-light"><a href="/" style=""><i class="material-icons">laptop_chromebook</i> Dashboard</a></li>
 
                <li class="waves-effect waves-light"><a href="#!" style=""><i class="material-icons"> perm_identity</i> Profil</a></li>
                <li class="waves-effect waves-light"><a href="{{ route('logout') }}" style=""><i class="material-icons"> power_settings_new</i> Déconnexion</a></li>
        </ul>
    </div>
    @yield('content')
        <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var elems = document.querySelectorAll('.menu-base');
                    var instances = M.FloatingActionButton.init(elems, {
                      toolbarEnabled: true
                    });
                  });
                </script>        
</body>
</html>
