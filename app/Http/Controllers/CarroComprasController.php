<?php

namespace App\Http\Controllers;

use App\Models\CarroCompras;
use Illuminate\Http\Request;

class CarroComprasController extends Controller
{
    /**
     * Mostrar la lista de productos en el carrito.
     */
    public function index()
    {
        $compras = CarroCompras::all();
        return response()->json([
            'Comparas' => $compras
        ]);
    }

    /**
     * Agregar un producto al carrito.
     */
    public function store(Request $request)
    {
        // Validar la entrada
        $request->validate([
            'product_id' => 'required|integer|',
        ]);

        // Simulación de agregar producto al carrito
        $carro = new CarroCompras();
        $carro->producto_id = $request->product_id;
        $carro->save();

        return response()->json([
            'message' => 'Producto agregado al carrito',
            'product_id' => $carro->producto_id
        ]);
    }

    /**
     * Mostrar un producto específico del carrito.
     */
    public function show($id)
    {
        $producto = CarroCompras::find($id);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto);
    }

    /**
     * Eliminar un producto del carrito.
     */
    public function destroy($id)
    {
        $producto = CarroCompras::find($id);

        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado del carrito']);
    }
}
