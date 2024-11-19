<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('products.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'sku' => 'required|unique:products',
            'price' => 'required',
            'image' => 'nullable|image'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products');
        }

        $product->save();

        return redirect()->route('products.index');
    }

    // Display the specified resource.
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'sku' => 'required|unique:products,sku,' . $product->id,
            'price' => 'required',
            'image' => 'nullable|image'
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->sku = $request->sku;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products');
        }

        $product->save();

        return redirect()->route('products.index');
    }

    // Remove the specified resource from storage.
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    // Display the specified resource.
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Search for a product.
    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->get();

        return view('products.index', compact('products'));
    }

    public function filter(Request $request)
    {
        $products = Product::where('price', '>=', $request->min_price)
            ->where('price', '<=', $request->max_price)
            ->get();

        return view('products.index', compact('products'));
    }

    // Sort the products.
    public function sort(Request $request)
    {
        $products = Product::orderBy($request->sort_by, $request->sort_order)->get();
        return view('products.index', compact('products'));
    }

    // Paginate the products.
    public function paginate(Request $request)
    {
        $products = Product::paginate($request->per_page);
        return view('products.index', compact('products'));
    }


}
