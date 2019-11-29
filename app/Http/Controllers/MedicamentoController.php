<?php

namespace App\Http\Controllers;

use App\medicamento_tratamiento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicamentos = MedicamentoController::all();

        return view('medicamentos/index',['medicamentos'=>$medicamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicamentos/create');
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
            'nombreComercial' => 'required|max:255',
            'composicion' => 'required|max:255',
            'presentacion'=> 'required|max:255',
            'enlaceOnline' => 'required|max:255',

        ]);
        $medicamento = new MedicamentoController($request->all());
        $medicamento->save();

        // return redirect('especialidades');

        flash('MedicamentoController creado correctamente');

        return redirect()->route('medicamento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicamento = MedicamentoController::find($id);

        return view('medicamentos/edit')->with('medicamento', $medicamento);
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
            'nombreComercial' => 'required|max:255',
            'composicion' => 'required|max:255',
            'presentacion'=> 'required|max:255',
            'enlaceOnline' => 'required|max:255',
        ]);

        $medicamento= MedicamentoController::find($id);
        $medicamento->fill($request->all());

        $medicamento->save();

        flash('MedicamentoController modificado correctamente');

        return redirect()->route('medicamento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicamento = MedicamentoController::find($id);
        $medicamento->delete();
        flash('MedicamentoController borrado correctamente');

        return redirect()->route('medicamento.index');
    }
}
