<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect('products');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate(['name' => 'required|string', 'description' => 'required|string',]);
        $product->update($request->all());
        return redirect()->route('products');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('products');
    }
    public function deleteSelection(Request $request)
    {
        $selectedIds = $request->input('ids');
        Product::whereIn('id', $selectedIds)->delete(); // Deletar os itens selecionados
        return response()->json(['success']);
    }
}
