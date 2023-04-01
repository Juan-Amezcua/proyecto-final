<x-layout>
    @include('partials._hero')

    @include('partials._busqueda')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($inmuebles) == 0)
            @foreach ($inmuebles as $inmueble)
                <x-inmueble-card :inmueble="$inmueble" />
            @endforeach
        @else
            <p>No hay inmuebles para mostrar</p>
        @endunless

    </div>
</x-layout>
