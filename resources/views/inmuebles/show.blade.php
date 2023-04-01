<x-layout>
    @include('partials._busqueda')
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Atras
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6" src="{{ asset('imagenes/logo.png') }}" alt="" />

                <h3 class="text-2xl mb-2">{{ $inmueble->titulo }}</h3>
                <div class="text-xl font-bold mb-4">{{ $inmueble->precio }}</div>

                <x-inmueble-etiquetas :etiquetasCsv="$inmueble->etiquetas" />

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i>{{ $inmueble->ubicacion }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Descripcion
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $inmueble->descripcion }}

                        <a href="mailto: {{ $inmueble->contacto }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-envelope"></i>
                            Contacto</a>

                    </div>
                </div>
            </div>
        </x-card>

        {{-- <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/inmuebles/{{ $inmueble->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Editar
            </a>

            <form method="POST" action="/inmuebles/{{ $inmueble->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>Eliminar</button>
            </form>
        </x-card> --}}

    </div>
</x-layout>
