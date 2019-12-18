<?php

namespace App\Http\Controllers;

use App\Centro;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    public function index()
    {
        //
        $centros = Centro::all();
        return view('centros/index')->with('centros', $centros);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centros/create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lugar' => 'required|max:255',
        ]);
        //
        $centro = new Centro($request->all());
        $centro->save();
        flash('Centro creado correctamente');
        return redirect()->route('centros.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centro = Centro::find($id);
        return view('centros/edit')->with('centro', $centro);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'lugar' => 'required|max:255',
        ]);
        $centro = Centro::find($id);
        $centro->fill($request->all());
        $centro->save();
        flash('Centro modificado correctamente');
        return redirect()->route('centros.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $centro = Centro::find($id);
        $centro->delete();
        flash('Centro borrado correctamente');
        return redirect()->route('centros.index');
    }
}
