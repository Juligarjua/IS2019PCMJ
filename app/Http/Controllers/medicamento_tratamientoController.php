<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class medicamento_tratamientoController extends Controller
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
        $medicamentos = MedicamentoController::all()->pluck('nombreComercial','id');
        $tratamientos = Tratamiento::all()->pluck('descripcion','id');
        return view('medicamento_tratamientoController/create',['medicamentos'=>$medicamentos, 'tratamientos'=>$tratamientos]);
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
        $medicamento_tratamiento = new medicamento_tratamientoController($request->all());
        $medicamento_tratamiento->save();


        flash('medicamento_tratamientoController creado correctamente');

        return redirect()->route('medicamento_tratamientoController.index');
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
        $medicamento_tratamiento = medicamento_tratamientoController::find($id);

        $medicamentos = MedicamentoController::all()->pluck('nombreComercial','id');
        $tratamientos = Tratamiento::all()->pluck('descripcion','id');


        return view('medicos/edit',['medicamento_tratamientoController'=> $medicamento_tratamiento, 'medicamentos'=>$medicamentos, 'tratamientos'=>$tratamientos ]);
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

        $medicamento_tratamiento = medicamento_tratamientoController::find($id);
        $medicamento_tratamiento->fill($request->all());

        $medicamento_tratamiento->save();

        flash('Medicamento_tratamiento modificado correctamente');

        return redirect()->route('medicamento_tratamientoController.index');
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
