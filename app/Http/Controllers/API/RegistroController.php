<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registro;
use App\Http\Resources\RegistroResource;
class RegistroController extends Controller
{
    public function index()
    {
        $registros = Registro::all();
        return response()->json($registros);
    }
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'valor' => 'nullable|float',
            'email' => 'nullable|email',
            'url' => 'nullable|string',
        ]);
        $registro = $request->user()->registros()->create($request->all());
        return new RegistroResource($registro);
    }
    public function show(Registro $registro)
    {
        return response()->json($registro);
    }
    public function update(Request $request, Registro $registro)
    {
        $this->authorize('update', $registro);
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'valor' => 'nullable|float',
            'email' => 'nullable|email',
            'url' => 'nullable|string',
        ]);
        $registro->update($validated);
        return new RegistroResource($registro);
    }
    public function destroy(Registro $registro)
    {
        $registro->delete();
        return response()->json(null, 204);
    }
}
