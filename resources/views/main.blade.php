<x-layouts.layout titulo="instituo">
<div class="w-full min-h-full flex items-center justify-center">
    @auth

    <h1 class="font-serif text-3xl text-white">Bienvenido/a {{ auth()->user()->name }}</h1>
        <a class="btn btn-primary" href="{{route("proyectos.index")}}">Ver proyectos</a>
    @endauth
    @guest
            <h1 class="font-serif text-3xl text-white">Esta es mi web :) </h1>
        @endguest
</div>
</x-layouts.layout>
