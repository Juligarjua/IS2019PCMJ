<?php

namespace App\Http\Controllers;

use App\Enfermedad;
use App\Tratamiento;
use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
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
        //

        $pacientes = Paciente::all();

        return view('pacientes/index',['pacientes'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $enfermedads = Enfermedad::all()->pluck('name','id');
        $tratamientos = Tratamiento::all()->pluck('descripcion','id');

        return view('pacientes/create',['enfermedads'=>$enfermedads,'tratamientos'=>$tratamientos]);

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
            'name' => 'required|max:255',
            'surname' => 'required|max:12',
            'nuhsa' => 'required|nuhsa|max:255|paciente,nuhsa',
            'enfermedad_id' => 'required|exists:enfermedads,id',
            'tratamiento_id' => 'required|exists:tratamientos,id'


        ]);

        //TODO: crear validación propia para nuhsa


        $paciente = new Paciente($request->all());
        $paciente->save();

        // return redirect('especialidades');

        flash('Paciente creado correctamente');

        return redirect()->route('pacientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO: Mostrar las citas de un paciente
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        $enfermedades = Enfermedad::all()->pluck('name','id');
        $tratamientos = Tratamiento::all()->pluck('descripcion','id');




        return view('pacientes/edit',['paciente'=> $paciente,'enfermedades'=> $enfermedades,'tratamientos'=>$tratamientos ]);
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'nuhsa' => 'required|nuhsa|max:12|paciente,nuhsa',
            'enfermedad_id' => 'required|exists:enfermedads,id',
            'tratamiento_id' => 'required|exists:tratamientos,id'

        ]);

        $paciente = Paciente::find($id);
        $paciente->fill($request->all());

        $paciente->save();

        flash('Paciente modificado correctamente');

        return redirect()->route('pacientes.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        flash('Paciente borrado correctamente');

        return redirect()->route('pacientes.index');
    }
}
