<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Create new employee
        try {
            $request->validate([
                'Nombre' => 'required',
                'Apellido_Paterno' => 'required',
                'Apellido_Materno' => 'required',
                'Correo' => 'required',
                'Telefono' => 'required'
            ]);

            $newEmp = new Empleado();

            $newEmp->Nombre = $request->input('Nombre');
            $newEmp->Apellido_Paterno = $request->input('Apellido_Paterno');
            $newEmp->Apellido_Materno = $request->input('Apellido_Materno');
            $newEmp->Correo = $request->input('Correo');
            $newEmp->Telefono = $request->input('Telefono');

            $res = $newEmp->save();

            if ($res) {
                return response()->json(['message' => 'Empleado creado correctamente']);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'No se pudo crear el empleado']);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
