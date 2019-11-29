<?php

namespace App\Http\Controllers;

use App\Especialidad;
use Illuminate\Http\Request;

use App\Medico;

class MedicoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();

        return view('medicos/index',['medicos'=>$medicos]);
    /**pasa todos los medicos de la vista que se muestra
    */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $especialidades = Especialidad::all()->pluck('name','id');

        return view('medicos/create',['especialidades'=>$especialidades]);

    }

    /** muestra formulario de creación
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id'
        ]);
        $medico = new Medico($request->all());
        $medico->save();

        // return redirect('especialidades');

        flash('Medico creado correctamente');

        return redirect()->route('medicos.index');
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

    /** el detalle de un paciente es mostrar (show). el detalle de un modelo.
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //le paso como parámetro la id. para que no saliera habría que poner "--model=photo"

        $medico = Medico::find($id);

        $especialidades = Especialidad::all()->pluck('name','id');


        return view('medicos/edit',['medico'=> $medico, 'especialidades'=>$especialidades ]);
    }

    /** muestra formulario de edicción. si ese modelo no se edita lo dejamos vacío
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'especialidad_id' => 'required|exists:especialidads,id'
        ]);

        $medico = Medico::find($id);
        $medico->fill($request->all());

        $medico->save();

        flash('Medico modificado correctamente');

        return redirect()->route('medicos.index');
    }

    /** actualizar
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medico = Medico::find($id);
        $medico->delete();
        flash('Medico borrado correctamente');

        return redirect()->route('medicos.index');
    }
}
