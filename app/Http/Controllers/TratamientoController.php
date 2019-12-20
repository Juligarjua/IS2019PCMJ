<?php

namespace App\Http\Controllers;

use App\Cita;
use App\Medicamento;
use App\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tratamientos = Tratamiento::all();

        return view('tratamientos/index',['tratamientos'=>$tratamientos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicamentos = Medicamento::all()->pluck('nombreComercial','id');

        $citas = Cita::all()->pluck('full_name','id');


        return view('tratamientos/create',['medicamentos'=>$medicamentos, 'citas'=>$citas]);
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
            'cita_id' => 'required|exists:citas,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:now',
            'descripcion' => 'required|max:255',
            'unidades' => 'required|max:255',
            'frecuencia' => 'required|max:255',
        ]);

        flash('Tratamiento creado correctamente');

        return redirect()->route('tratamientos.index');
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

        $tratamientos = Tratamiento::find($id);

        $medicamentos = Medicamento::all()->pluck('nombreCompleto','id');

        $citas = Cita::all()->pluck('full_name','id');


        return view('tratamientos/edit',['tratamiento'=> $tratamientos, 'medicamentos'=>$medicamentos, 'citas'=>$citas]);
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
            'cita_id' => 'required|exists:medicos,id',
            'medicamento_id' => 'required|exists:pacientes,id',
            'fecha_inicio' => 'required|date|after:now',
            'fecha_fin' => 'required|date|after:now',
            'descripcion' => 'required|max:255',
            'unidades' => 'required|max:255',
            'frecuencia' => 'required|max:255',

        ]);

        flash('Tratamiento actualizado correctamente');

        return redirect()->route('tratamientos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tratamiento = Tratamiento::find($id);
        $tratamiento->delete();
        flash('Tratamiento borrado correctamente');

        return redirect()->route('tratamientos.index');
    }
}
