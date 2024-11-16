<?php

namespace App\Http\Controllers;

use App\Models\Stores;
use Illuminate\Http\Request;



class StoreController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Stores::all();
        return view('stores.dashboard', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate input
    $validated = $request->validate([
        'product_name' => 'required|string|max:255',
        'product_price' => 'required|integer',
        'product_quantity' => 'required|integer',
        'product_description' => 'required|string',
        'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle the image upload
    $imagePath = null;
    if ($request->hasFile('product_image')) {
        // Store image in the "public/products" folder
        $imagePath = $request->file('product_image')->storeAs(
            'products',
            time() . '_' . $request->file('product_image')->getClientOriginalName(),
            'public'
        );
    }

    // Save to database
    Stores::create([
        'product_name' => $validated['product_name'],
        'product_price' => $validated['product_price'],
        'product_quantity' => $validated['product_quantity'],
        'product_description' => $validated['product_description'],
        'product_image' => $imagePath, // Save the image path
    ]);

    return redirect()->route('stores.dashboard')->with('success', 'Product added successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stores = Stores::findorfail(($id));
        return view('stores.show',compact('stores'));
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
