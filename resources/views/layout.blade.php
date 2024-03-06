<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.meta />
    <x-head.script />
    <x-head.link />
    <x-head.title :title="'Kochen für Arme'"/>  
</head>
<x-shared.notify-message/>
<body>
    <div class="header">
        <x-header.page-logo />
        <x-header.page-title :title="'Kochen für Arme'"/>
        @include('partials._search')
        <x-header.page-navigation />
    </div>
    @yield('content')
</body>
</html>