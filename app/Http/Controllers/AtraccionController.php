<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraccion;

class AtraccionController extends Controller
{
    public function index()
    {
        $atracciones = Atraccion::with('comentarios')->get();
        foreach ($atracciones as $atraccion) {
            $atraccion->calificacion_promedio = $atraccion->comentarios->avg('calificacion');
        }
        return view('atracciones.index', compact('atracciones'));
    }

    public function update(Request $request, $id)
    {
        $atraccion = Atraccion::findOrFail($id);
        $atraccion->update($request->all());
        return response()->json($atraccion);
    }
}
