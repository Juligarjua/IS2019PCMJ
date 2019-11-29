<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class medicamento_tratamiento extends Controller
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
        $medicamentos = Medicamento::all()->pluck('nombreComercial','id');
        $tratamientos = Tratamiento::all()->pluck('descripcion','id');
        return view('medicamento_tratamiento/create',['medicamentos'=>$medicamentos, 'tratamientos'=>$tratamientos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'medicamento_id' => 'required|exists:medicamento,id',
            'tratamiento_id' => 'required|exists:tratamiento,id'
        ]);
        $medicamento_tratamiento = new medicamento_tratamiento($request->all());
        $medicamento_tratamiento->save();


        flash('medicamento_tratamiento creado correctamente');

        return redirect()->route('medicamento_tratamiento.index');
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
        $medicamento_tratamiento = medicamento_tratamiento::find($id);

        $medicamentos = Medicamento::all()->pluck('nombreComercial','id');
        $tratamientos = Tratamiento::all()->pluck('descripcion','id');


        return view('medicos/edit',['medicamento_tratamiento'=> $medicamento_tratamiento, 'medicamentos'=>$medicamentos, 'tratamientos'=>$tratamientos ]);
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
        $this->validate($request, [
            'medicamento_id' => 'required|exists:medicamento,id',
            'tratamiento_id' => 'required|exists:tratamiento,id'
        ]);

        $medicamento_tratamiento = medicamento_tratamiento::find($id);
        $medicamento_tratamiento->fill($request->all());

        $medicamento_tratamiento->save();

        flash('Medicamento_tratamiento modificado correctamente');

        return redirect()->route('medicamento_tratamiento.index');
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
