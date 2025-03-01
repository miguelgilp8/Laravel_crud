<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$titulo ??""}}</title>
    @vite (["resources/css/app.css","resources/js/app.js"])
</head>
<body class="h-screen flex flex-col">
<div class="h-[25%]">
    <x-layouts.header />
</div>
<main class="h-[65%] bg-[#9c9d9f] overflow-auto">
    {{$slot}}
</main>
<div class="h-[10%]">
    <x-layouts.footer />
</div>
</body>
</html>
