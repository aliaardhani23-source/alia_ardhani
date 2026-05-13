<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // READ (list)
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // CREATE (form)
    public function create()
    {
        return view('products.create');
    }

    // STORE (simpan)
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    // EDIT (form)
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // UPDATE
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_produk' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    // DELETE
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}