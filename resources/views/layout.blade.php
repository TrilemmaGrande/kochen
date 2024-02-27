<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{!! asset('resources/css/style.css') !!}" rel="stylesheet">
    <link rel="icon" href="{!! asset('images/tuxchef.ico') !!}"/>
    <title>Kochen für Arme</title>
</head>
<x-notify-message/>
<body>
    <a href="/"><img class="logo" src="{{asset('images/tuxchef.png')}}" alt="linux tux with chefs hat logo" /></a>
    <h1>Kochen für Arme</h1>
    <a href="/recipes/create"><p>Neues Rezept</p></a>
    @yield('content')
</body>
</html>