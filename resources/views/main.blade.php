<x-layouts.layout titulo="instituo">
<div class="w-full min-h-full flex items-center justify-center">
    @auth

    <h1 class="font-serif text-3xl text-white">Bienvenido/a {{ auth()->user()->name }}</h1>
        <a href="{{route("proyectos.index")}}" class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-white rounded-lg">Ver proyectos</a>
    @endauth
    @guest
    <h1 class="font-serif text-3xl text-white">{{ __('Esta es mi web :)') }}</h1>
        @endguest
</div>
</x-layouts.layout>
