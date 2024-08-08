<?php

namespace App\Http\Controllers;
use App\Models\Especie;
use App\Models\Atraccion;
use Illuminate\Http\Request;


class EspecieController extends Controller
{
    public function index()
    {
        $especies = Especie::all();
        return response()->json($especies);
    }

    public function especieAtraccion($id_atraccion)
    {
        $atraccion = Atraccion::findOrFail($id_atraccion);
        $especie = $atraccion->especie;
        return response()->json($especie);
    }

    public function atraccionesEspecie($id_especie)
    {
        $atracciones = Atraccion::where('id_especie', $id_especie)->get();
        return response()->json($atracciones);
    }

    public function calificacionPromedioEspecie($id_especie)
    {
        $atracciones = Atraccion::where('id_especie', $id_especie)->with('comentarios')->get();
        $promedio = $atracciones->flatMap->comentarios->avg('calificacion');
        return response()->json(['calificacion_promedio' => $promedio]);
    }
}
