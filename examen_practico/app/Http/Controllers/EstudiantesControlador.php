<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudiantesControlador extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Estudiantes = Estudiante::all();
        return view('estudiante.index')->with('estudiante',$Estudiantes);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $NIF = $request ->get('nif');
        $nombres = $request ->get('nombre');
        $apellido = $request ->get('apellido');
        $fecha_nacimiento = $request ->get('fecha_nacimiento');
        $localidad = $request ->get('localidad');
        $telefono = $request ->get('telefono');
        
        DB::Insert('insert into estudiantes(nif,nombre,apellido,fecha_nacimiento) values (?,?,?,?,?)', [$nif,$nombre,$apellido,$fecha_nacimiento,$localidad,$telefono]);

        return redirect('/estudiantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        return view('estudiante.edit')->with('estudiante', $estudiante);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('estudiantes')->where('id',$id)->decrement('cantidad',1);

        return redirect('/articulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::find($id);
        $articulo->delete();

        return redirect('/articulos');
    }
}
