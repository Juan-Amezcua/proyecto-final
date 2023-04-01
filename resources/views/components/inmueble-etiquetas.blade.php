@props(['etiquetasCsv'])

@php
    $etiquetas = explode(',', $etiquetasCsv);
@endphp

<ul class="flex">
    @foreach ($etiquetas as $etiqueta)
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?etiqueta={{ $etiqueta }}">{{ $etiqueta }}</a>
        </li>
    @endforeach
</ul>
