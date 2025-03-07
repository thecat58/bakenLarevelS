<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener la ruta absoluta del archivo JSON usando el helper resource_path
        $path = resource_path('json/json.json');
        
        // Verificar si el archivo existe
        if (!file_exists($path)) {
            return response()->json(['error' => 'Archivo JSON no encontrado'], 404);
        }
        
        // Leer el contenido del archivo JSON
        $jsonContent = file_get_contents($path);
        
        // Decodificar el contenido JSON a un array asociativo
        $data = json_decode($jsonContent, true);
        
        // Recorrer los datos del JSON
        foreach ($data as $key => $item) {
            // Aquí puedes realizar las operaciones que necesites con cada elemento.
            // Por ejemplo, podrías agregar un log, transformar datos, etc.
            // Log::info("Elemento $key", $item);
        }
        
        // Retornar la respuesta con los datos procesados
        return response()->json([
            'message' => 'Datos procesados correctamente',
            'data' => $data
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
