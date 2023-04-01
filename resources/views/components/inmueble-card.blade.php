@props(['inmueble'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{ asset('imagenes/logo.png') }}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/inmuebles/{{ $inmueble->id }}">{{ $inmueble->titulo }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $inmueble->precio }}</div>
            <x-inmueble-etiquetas :etiquetasCsv="$inmueble->etiquetas" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $inmueble->ubicacion }}
            </div>
        </div>
    </div>
</x-card>
