<x-layouts.layout titulo="Editar Proyecto">
    <div class="flex flex-row justify-center items-center min-h-full bg-gray-300">
        <!-- Session Status -->
        <form action="{{route("proyectos.update", $proyecto->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="bg-white rounded-2xl p-5">
                <div>
                    <x-input-label for="titulo" value="Titulo"/>
                    <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo"
                                  value="{{ $proyecto->titulo}}"/>
                    @error("titulo")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror


                </div>
                <div>
                    <x-input-label for="horas_previstas" value="Horas Previstas"/>
                    <x-text-input id="horas_previstas" class="block mt-1 w-full"
                                  type="number" name="horas_previstas"
                                  value="{{$proyecto->horas_previstas}}"
                                  />
                    @error("horas_previstas")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror

                </div>
                <div>
                    <x-input-label for="f_comienzo" value="Fecha de Comienzo" />

                    <x-text-input id="f_comienzo" class="block mt-1 w-full"
                                  type="date" name="f_comienzo"
                                  value="{{$proyecto->f_comienzo}}"
                                   />
                    @error("f_comienzo")
                    <div class="text-sm text-red-600">
                        {{$message}}
                    </div>
                    @enderror

                </div>

                <div class="p-2">
                    <button class= "btn btn-sm btn-success"  type="submit">Guardar </button>
                    <a class= "btn btn-sm btn-success" href="{{route("proyectos.index")}}">Cancelar</a>
                </div>
            </div>

        </form>
    </div>

</x-layouts.layout>
