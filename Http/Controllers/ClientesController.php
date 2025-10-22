<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function index()
    {
         $clientes = clientes::all();
        return view('clientes.index',compact('clientes'));
    }


    public function create()
    {
         return view('clientes.create', compact('clientes'));
    }
    public function store(Request $request)
    {
     $request->validate([
            'nombre'=>'request|string|max:250',
            'apellido'=>'request|string|max:250',
            'telefono'=>'request|integer|max:250',
            'correo'=>'request|string|max:250',
        ]);

        clientes::create($request->all());
        return redirect('/clientes')->with('success','registro exitoso');
    }

    public function edit(clientes $clientes)
    {
        
        return view('clientes.edit',compact('clientes'));
    }

    public function update(Request $request, clientes $clientes)
    {
        $request->validate([
            'nombre'=>'request|string|max:250',
            'apellido'=>'request|string|max:250',
            'telefono'=>'request|integer|max:250',
            'correo'=>'request|string|max:250',
        ]);

         $clientes=clientes::findOrFail($clientes);
        $clientes->update([
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'telefono'=>$request->telefono,
        ]);

        return redirect()->route('repartidores.index')->with('success','actualizacion exitosa');
    }

    public function destroy(clientes $id_clientes)
    {
       
        $id_clientes->Delete();
        return redirect()->route('clientes.index')->with('success','eliminacion exitosa');
    }
}
