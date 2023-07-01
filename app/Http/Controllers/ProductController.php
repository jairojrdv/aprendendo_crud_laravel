<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('product.index', [
            'products' => Product::query()
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $is_active = $request->is_active === "true" ? true : false;
        Product::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_active' => $is_active,
        ]);

        return to_route('empresa.listagem_cadastro_produto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product)
    {
        $is_active = $product->is_active === "true" ? true : false;
        $product->update([
            'name' => request()->name,
            'description' => request()->description,
            'price' => request()->price,
            'is_active' => $is_active,
        ]);

        return to_route('empresa.listagem_cadastro_produto');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return to_route('empresa.listagem_cadastro_produto');
    }
}
