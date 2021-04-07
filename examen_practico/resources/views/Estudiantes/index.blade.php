@extends('layouts.plantillabase');

@section('contenido');

<a href="articulos/create" class="btn btn-primary">Agregar Estudiantes</a>

<table class="table table-dark table-striped mt-4">
<thead>
<tr>
<th>NIF</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Fecha de nacimiento</th>
<th>Localidad</th>
<th>Telefono</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
@foreach ($estudiantes as $estudiantes)
<tr>
<td>{{ $estudiantes->id }}</td>
<td>{{ $estudiantes->nif }}</td>
<td>{{ $estudiantes->nombres }}</td>
<td>{{ $estudiantes->apellidos }}</td>
<td>{{ $estudiantes->fecha_nacimiento }}</td>
<td>{{ $estudiantes->localidad }}</td>
<td>{{ $estudiantes->telefono }}</td>
<td>
<div class="btn-group" role="group" aria-label="Basic example">
<button type="button" class="btn btn-primary">Reducir</button>
<button type="button" class="btn btn-primary">Aumentar</button>
</div>
</td>
<td>
<Form action="{{route('articulos.destroy',$articulo->id)}}" method="POST">
@csrf
@method('DELETE')
 <a href="/articulos/{{ $articulo->id }}/edit" class="btn btn-info">Editar</a>
<button type="submit" class="btn btn-danger">Eliminar</button> 
</Form>

</td>
</tr>
@endforeach
</tbody>
</table>

@endsection