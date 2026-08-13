<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $title = "Data Product";
        return view('product.index', compact('title', 'products'));
    }
    public function create()
    {
        $title = "Create Role";
        $categories = Category::get();
        return view('product.create', compact('title', 'categories'));
    }
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description
        ];
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('products', 'public');
        }
        Product::create($data);
        return redirect()->to('product')->with('success', 'create product success');
    }
    public function edit(int $id)
    {
        $title = "Edit Product";
        $products = Product::findOrFail($id);
        return view('product.edit', compact('title', 'products'));
    }
    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'is_active' => $request->has('is_active') ? 1 : 0
        ]);
        return redirect()->to('product');
    }
    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->to('product');
    }
}
