<x-layouts.layout titulo="listado">


    @if (session("mensaje"))
        <div id="message" role="alert" class="alert alert-success">
            <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 shrink-0 stroke-current"
                    fill="none"
                    viewBox="0 0 24 24">
                <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{session("mensaje")}}</span>
        </div>
    @endif

    <div class="max-h-full overflow-x-auto">

        <a class="btn btn-sm btn-secondary " href="{{route("proyectos.create")}}">Crear proyecto</a>
        <a class="btn btn-sm btn-secondary " href="{{route("main")}}">Home</a>

        <table class="table table-xs table-pin-rows table-pin-cols">
            <thead>
            <tr>
                @foreach($campos as $campo)
                    <th>{{$campo}}</th>
                @endforeach
                <th></th><th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($filas as $fila)
                <tr>
                    @foreach($campos as $campo)
                        <td>{{$fila->$campo}}</td>
                    @endforeach

            @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.layout>
