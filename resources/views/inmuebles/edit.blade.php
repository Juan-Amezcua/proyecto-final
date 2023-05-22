<x-layout>

    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edita tu anuncio
            </h2>
            <p class="mb-4">No dejes campos vacíos {{ $inmueble->titulo }}</p>
        </header>

        <form method="POST" action="/inmuebles/{{ $inmueble->id }}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="titulo" class="inline-block text-lg mb-2">Título del anuncio</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="titulo"
                    placeholder="Minimo 10 caracteres" value="{{ $inmueble->titulo }}" />
                @error('titulo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="imagen" class="inline-block text-lg mb-2">Imagen de muestra</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="imagen" />
                <img class="w-48 mr-6 mb-6"
                    src="{{ $inmueble->imagen ? asset('storage/' . $inmueble->imagen) : asset('/imagenes/logo.png') }}"
                    alt="" />
                @error('imagen')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="etiquetas" class="inline-block text-lg mb-2">
                    Etiquetas (Separadas por coma)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="etiquetas"
                    placeholder="Ejemplo: Gimnasio, Alberca, Estacionamiento, etc" value="{{ $inmueble->etiquetas }}" />
                @error('etiquetas')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="descripcion" class="inline-block text-lg mb-2">
                    Descripción
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="descripcion" rows="10"
                    placeholder="Minimo 50 caracteres">{{ $inmueble->descripcion }}
                </textarea>
                @error('descripcion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="precio" class="inline-block text-lg mb-2">Precio</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="precio"
                    placeholder="Solo datos numericos" value="{{ $inmueble->precio }}" />
                @error('precio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="ubicacion" class="inline-block text-lg mb-2">Ubicación</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="ubicacion"
                    placeholder="Ejemplo: Av Artesanos #1448, Guadalajara" value="{{ $inmueble->ubicacion }}" />
                @error('ubicacion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="contacto" class="inline-block text-lg mb-2">Email de contacto</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contacto"
                    placeholder="Dirección Email válida" value="{{ $inmueble->contacto }}" />
                @error('contacto')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Actualiza tu anuncio
                </button>

                <a href="/" class="text-black ml-4"> Atras </a>
            </div>
        </form>
    </x-card>
</x-layout>
