<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--
        On ouvre la fenêtre à la largeur de l’écran :width=device-width
        On règle le zoom :initial-scale=1
        On ajoute  shrink-to-fit=no  spécifiquement pour Safari
    --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('partials._stylesheets')
    <title>{{ config('app.name') }} - {{ $titre ?? 'Accueil'}}</title>
  </head>
    <body style="background-color:#e9ecf0;" onload="afficherChaqueSecondeHeure()">

        @yield('content')

        @include('partials._scripts')
  </body>
</html>
