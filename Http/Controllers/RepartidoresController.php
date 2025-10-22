<?php

namespace App\Http\Controllers;

use App\Models\repartidores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RepartidoresController extends Controller
{
    public function index()
    {
        $repartidores = repartidores::all();
        return view('repartidores.index',compact('repartidores'));
    }

    public function create()
    {
        return view('repartidores.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'request|string|max:250',
            'apellido'=>'request|string|max:250',
            'telefono'=>'request|integer|max:250',
            ''
        ]);

        repartidores::create($request->all());
        return redirect('/repartidores')->with('success','registro exitoso');
    }

    public function show(repartidores $repartidores)
    {
        //
    }

    public function edit(repartidores $repartidores)
    {
        $repartidores=repartidores::findOrFail($repartidores);
        return view('repartidores.edit',compact(''));
    }

    public function update(Request $request, repartidores $repartidores)
    {
        $request->validate([
             'nombre'=>'request|string|max:250',
            'apellido'=>'request|string|max:250',
            'telefono'=>'request|integer|max:250',
            ''
        ]);

        $repartidores=repartidores::findOrFail($repartidores);
        $repartidores->update([
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'telefono'=>$request->telefono,
        ]);

        return redirect()->route('repartidores.index')->with('success','actualizacion exitosa');
    }

    public function destroy(repartidores $repartidores)
    {
        $repartidores=repartidores::findOrFail($repartidores);
        $repartidores->Delete();
        return redirect()->route('repartidores.index')->with('success','eliminacion exitosa');
    }
}
