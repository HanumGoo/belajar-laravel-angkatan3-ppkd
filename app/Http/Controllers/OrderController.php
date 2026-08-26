<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $products = Product::OrderBy('id')->get();
        return view('order.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exist:products,id',
            'items.*.qty' => 'required|integer|min:1',
            'payment_method' => 'nullable|string'
        ]);
        try {
            return DB::transaction(function () use ($request) {
                $subtotal = 0;
                $itemsData = [];

                foreach ($request->items as $item) {
                    $product = Product::find($item['id']);

                    $itemSubTotal = $product->price * $item['qty'];
                    $subtotal += $itemSubTotal;

                    $itemData[] = [
                        'product' => $product,
                        'qty' => $item['qty'],
                        'price' => $product->price,
                        'subtotal' => $itemSubTotal
                    ];
                }

                $tax = $subtotal * 0.1;
                $total = $subtotal + $tax;
                $orderCode = 'ORD-' . date('ymd') . '-' . rand(1000, 9999);
                $paymentMethod = $request->payment_method ?? 'cash';

                $order = Order::create([
                    'order_code' => $orderCode,
                    'order_amount' => $total,
                    'order_change' => 0,
                    'status' => $paymentMethod === 'cash' ? 'success' : 'pending';
                ]);
            });
        } catch (\Throwable $th) {

        }
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
