<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $comentario = Comentario::create($request->all());
        return response()->json($comentario);
    }

    public function comentariosEntreCalificaciones($min, $max)
    {
        $comentarios = Comentario::whereBetween('calificacion', [$min, $max])->get();
        return response()->json($comentarios);
    }

    public function cantidadComentariosAtraccion($id_atraccion)
    {
        $cantidad = Comentario::where('id_atraccion', $id_atraccion)->count();
        return response()->json(['cantidad' => $cantidad]);
    }

}
