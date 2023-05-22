<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
// use Illuminate\Support\Facades\Storage;

class InmuebleController extends Controller
{

    // Todos los inmuebles
    public function index()
    {
        return view('inmuebles.index', [
            'inmuebles' => Inmueble::latest()->filter(request(['etiqueta', 'busqueda']))->get()
        ]);
    }

    // Un solo inmueble
    public function show(Inmueble $inmueble)
    {
        return view('inmuebles.show', [
            'inmueble' => $inmueble
        ]);
    }

    // Mostrar formulario para crear nuevo
    public function create()
    {
        return view('inmuebles.create');
    }

    // Almacenar información del anuncio
    public function store(Request $request)
    {
        $camposFormulario = $request->validate([
            'titulo' => ['required', 'min:10'],
            'imagen' => 'image',
            'etiquetas' => 'required',
            'descripcion' => ['required', 'min:50'],
            'precio' => ['required', 'numeric'],
            'ubicacion' => 'required',
            'contacto' => ['required', 'email']
        ], [
            'titulo.required' => 'El titulo es obligatorio',
            'titulo.min' => 'El titulo debe tener minimo 10 caracteres',
            'imagen.image' => 'El tipo de archivo debe ser una imagen',
            'etiquetas.required' => 'Las etiquetas son obligatorias',
            'descripcion.required' => 'La descripción es obligatoria',
            'descripcion.min' => 'La descripción debe tener minimo 50 caracteres',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio solo debe contener números',
            'ubicacion.required' => 'La ubicación es obligatoria',
            'contacto.required' => 'El email es obligatorio',
            'contacto.email' => 'Debe ser un email válido',
        ]);

        if ($request->hasFile('imagen')) {
            $camposFormulario['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }

        $camposFormulario['user_id'] = auth()->id();

        Inmueble::create($camposFormulario);

        return redirect('/')->with('mensaje', 'Anuncio publicado con éxito');
    }

    // Mostrar el formulario para editar
    public function edit(Inmueble $inmueble)
    {
        return view('inmuebles.edit', ['inmueble' => $inmueble]);
    }

    // Actualizar información del anuncio
    public function update(Request $request, Inmueble $inmueble)
    {
        // Verificando si el usuario el el propietario del anuncio
        if ($inmueble->user_id != auth()->id()) {
            abort(403, 'Acción no autorizada');
        }

        $camposFormulario = $request->validate([
            'titulo' => ['required', 'min:10'],
            'imagen' => 'image',
            'etiquetas' => 'required',
            'descripcion' => ['required', 'min:50'],
            'precio' => ['required', 'numeric'],
            'ubicacion' => 'required',
            'contacto' => ['required', 'email']
        ], [
            'titulo.required' => 'El titulo es obligatorio',
            'titulo.min' => 'El titulo debe tener minimo 10 caracteres',
            'imagen.image' => 'El tipo de archivo debe ser una imagen',
            'etiquetas.required' => 'Las etiquetas son obligatorias',
            'descripcion.required' => 'La descripción es obligatoria',
            'descripcion.min' => 'La descripción debe tener minimo 50 caracteres',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio solo debe contener números',
            'ubicacion.required' => 'La ubicación es obligatoria',
            'contacto.required' => 'El email es obligatorio',
            'contacto.email' => 'Debe ser un email válido'
        ]);

        if ($request->hasFile('imagen')) {
            $camposFormulario['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }

        $inmueble->update($camposFormulario);

        return back()->with('mensaje', 'Anuncio actualizado con éxito');
    }

    // Eliminar anuncio
    public function destroy(Inmueble $inmueble)
    {
        // Verificando si el usuario el el propietario del anuncio
        if ($inmueble->user_id != auth()->id()) {
            abort(403, 'Acción no autorizada');
        }

        $inmueble->delete();
        return redirect('/')->with('mensaje', 'Anuncio eliminado exitosamente');
    }

    /* Gestionar Anuncios*/
    public function gestion()
    {
        return view('inmuebles.gestion', ['inmuebles' => auth()->user()->inmuebles()->get()]);
    }
}
