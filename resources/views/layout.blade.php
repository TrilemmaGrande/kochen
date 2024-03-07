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
    <div class="page-container">
        <div class="header">
            <x-header.page-logo />
            <x-header.page-title :title="'Kochen für Arme'"/>
            <div class=header-search>
                @include('partials._search')
            </div>
            <x-header.page-navigation />
        </div>
            @yield('content')
    </div>
</body>
</html>