<x-layout>

    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Publica un nuevo inmueble
            </h2>
            <p class="mb-4">Todos los campos son obligatorios (excepto la imagen)</p>
        </header>

        <form method="POST" action="/inmuebles" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="titulo" class="inline-block text-lg mb-2">Título del anuncio</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="titulo"
                    placeholder="Minimo 10 caracteres" value="{{ old('titulo') }}" required />
                @error('titulo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="imagen" class="inline-block text-lg mb-2">Imagen de muestra</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="imagen"
                    {{-- value="{{ old('imagen') }} " --}} />
                @error('imagen')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="etiquetas" class="inline-block text-lg mb-2">
                    Etiquetas (Separadas por coma)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="etiquetas"
                    placeholder="Ejemplo: Gimnasio, Alberca, Estacionamiento, etc" value="{{ old('etiquetas') }}"
                    required />
                @error('etiquetas')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="descripcion" class="inline-block text-lg mb-2">
                    Descripción
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="descripcion" rows="10"
                    placeholder="Minimo 50 caracteres">{{ old('descripcion') }}
                </textarea>
                @error('descripcion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="precio" class="inline-block text-lg mb-2">Precio</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="precio"
                    placeholder="Solo datos numericos" value="{{ old('precio') }}" required />
                @error('precio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="ubicacion" class="inline-block text-lg mb-2">Ubicación</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="ubicacion"
                    placeholder="Ejemplo: Av Artesanos #1448, Guadalajara" value="{{ old('ubicacion') }}" required />
                @error('ubicacion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="contacto" class="inline-block text-lg mb-2">Email de contacto</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="contacto"
                    placeholder="Dirección Email válida" value="{{ old('contacto') }}" required />
                @error('contacto')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Postea tu anuncio
                </button>

                <a href="/" class="text-black ml-4"> Atras </a>
            </div>
        </form>
    </x-card>
</x-layout>
