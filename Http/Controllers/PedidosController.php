<?php

namespace App\Http\Controllers;

use App\Models\pedidos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PedidosController extends Controller
{

    public function index()
    {
        $pedidos=pedidos::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_vehiculo'=>'request|string|max:250',
            'paradas'=>'request|string|max:250',
            'direccion'=>'request|string|max:250',

            'tipo_paquete'=>'request|string|max:250',
        ]);

        pedidos::create($request->all());
        return redirect('/pedidos')-with('success','registro exitoso');

    }


    public function chat($mensaje)
    {
      

        // Lista de palabras clave y sus respuestas
    $respuestas = [
    [
        "palabras" => ["hola", "buenas", "buenos dias", "buenas tardes", "buenas noches", "saludos"],
        "respuesta" => "¡Hola! Bienvenido a nuestro servicio de atención al cliente. ¿En qué puedo ayudarte hoy? 😊"
    ],
    [
        "palabras" => ["precio", "cuanto vale", "valor"],
        "respuesta" => "Nuestros precios dependen del producto que busques."
    ],
    [
        "palabras" => ["adios", "hasta luego", "chao"],
        "respuesta" => "¡Hasta luego! 👋"
    ],
    [
        "palabras" => ["lineas de atencion", "contacto", "telefono", "correo"],
        "respuesta" => "📞 3164441743 ✉ camacho03ye@gmail.com"
    ],
    [
        "palabras" => ["menu", "carta"],
        "respuesta" => "Nuestro menú incluye una variedad de platos deliciosos."
    ],
    [
        "palabras" => ["horario", "hora de apertura", "hora de cierre"],
        "respuesta" => "Abrimos todos los días de 8 AM a 10 PM."
    ],
     [
        "palabras" => ["facturas"],
        "respuesta" => "Para solicitar facturas, por favor envíanos un correo a"
    ]
];

// Respuesta por defecto
$respuesta = "No entendí tu pregunta, pero puedo ayudarte.";

// Buscar si el mensaje contiene alguna palabra clave
foreach ($respuestas as $item) {
    foreach ($item["palabras"] as $palabra) {
        if (strpos($mensaje, $palabra) !== false) {
            $respuesta = $item["respuesta"];
            return response()->json($respuesta);
            //break 2; // salir de ambos bucles
        }
    }
}
  if (is_numeric($mensaje)) {
        $pedido = pedidos::findOrFail($mensaje);
        $pedidos = DB::select('SELECT * FROM pedidos');
        return response()->json($pedidos);
    }
 

    }

    public function show(pedidos $pedidos)
    {
         
    }

    public function edit(pedidos $pedidos)
    {
        $pedidos=pedidos::findOrFail($pedidos);
        return view('pedidos.edit', compact(''));
    }

    public function update(Request $request, pedidos $pedidos)
    {
        $request->validate([
            'tipo_vehiculo'=>'request|string|max:250',
            'paradas'=>'request|string|max:250',
            'direccion'=>'request|string|max:250',
            'tipo_paquete'=>'request|string|max:250',
        ]);

        $pedidos=pedidos::findOrFail($pedidos);
        $pedidos->update([
            'tipo_vehiculo'=>$request->tipo_vehiculo,
            'paradas'=>$request->paradas,
            'direccion'=>$request->direccion,
            'tipo_paquete'=>$request->tipo_paquete,
        ]);

        return redirect()->route('pedidos.index')->with('success','actualizacion exitosa');
        }

    public function destroy(pedidos $pedidos)
    {
        $pedidos=pedidos::findOrFail($pedidos);
        $pedidos->delete();
        return redirect()->route('pedidos.index')->with('success','eliminacion exitosa');
    }
}
