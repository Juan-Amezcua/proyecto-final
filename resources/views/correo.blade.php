<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Envío correo personalizado
            </h2>
            <p class="mb-4">Todos los campos son obligatorios</p>
        </header>

        <form method="POST" action="/enviar-correo">
            @csrf
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" required />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="mensaje" class="inline-block text-lg mb-2">
                    Cuerpo del correo
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="mensaje" rows="10">{{ old('mensaje') }}
                </textarea>
                @error('mensaje')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Envíar correo
                </button>
            </div>
        </form>

        <div class="mt-8">
            <p>
                ¿Ya tienes una cuenta?
                <a href="/acceso" class="text-laravel">Accede</a>
            </p>
        </div>
        </form>
    </x-card>
</x-layout>
