<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required|string',
            'categoria' => 'required|string|max:255',
            'urlimagen' => 'nullable|url'
        ]);

        $product = Product::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'urlimagen' => $request->urlimagen
        ]);

        return redirect('/product')
            ->with('success', 'Producto creado correctamente.');
    }

    public function show($idProduct)
    {
        $product = Product::findOrFail($idProduct);

        return view('product.show', [
            'product' => $product
        ]);
    }

    public function edit($idProduct)
    {
        $product = Product::findOrFail($idProduct);

        return view('product.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, $idProduct)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'required|string',
            'categoria' => 'required|string|max:255',
            'urlimagen' => 'nullable|url'
        ]);

        $product = Product::findOrFail($idProduct);

        $product->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'categoria' => $request->categoria,
            'urlimagen' => $request->urlimagen
        ]);

        return redirect('/product')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($idProduct)
    {
        $product = Product::findOrFail($idProduct);

        $product->delete();

        return redirect('/product')
            ->with('success', 'Producto eliminado correctamente.');
    }
}