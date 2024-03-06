<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.meta />
    <x-head.script />
    <x-head.link />
    <x-head.title />  
</head>
<x-shared.notify-message/>
<body>
    <x-header.page-logo />
    <x-header.page-title />
    <x-header.page-navigation />
    @yield('content')
</body>
</html>