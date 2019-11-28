<?php

namespace App\Http\Controllers;

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
        $tratamiento = Tratamiento::all();

        return view('tratamientos/index',['tratamientos'=>$tratamiento]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tratamientos/create');

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
            'fecha_inicio' => 'required|date|after:now',
            'fecha_final' => 'required|date|after:now',
            'descripcion' => 'required|max:255',
            'unidades' => 'required|numeric',
            'frecuencia' => 'required|numeric',

        ]);
        $tratamiento = new Tratamiento($request->all());
        $tratamiento->save();


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
        $tratamiento = Tratamiento::find($id);

        return view('tratamientos/edit')->with('tratamientos', $tratamiento);
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
            'fecha_inicio' => 'required|date|after:now',
            'fecha_final' => 'required|date|after:now',
            'descripcion' => 'required|max:255',
            'unidades' => 'required|numeric',
            'frecuencia' => 'required|numeric',
        ]);

        $tratamiento = Tratamiento::find($id);
        $tratamiento->fill($request->all());

        $tratamiento->save();

        flash('Tratamiento modificado correctamente');

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
    public function destroyAll()
    {
        Tratamiento::truncate();
        flash('Todos las tratamientos borrados correctamente');

        return redirect()->route('tratamientos.index');
    }
}
