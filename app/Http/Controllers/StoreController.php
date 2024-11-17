<?php

namespace App\Http\Controllers;

use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
        'product_image' => $imagePath,
    ]);

    return redirect()->route('stores.dashboard')->with('success', 'Product added successfully!');
}


    /**
     * Display the specified resource.
     */
    public function view(string $id)
    {
        $stores = Stores::findorfail(($id));
        return view('stores.view',compact('stores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $stores = Stores::findorfail(($id));
        return view('stores.edit',compact('stores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming data, including the image
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|integer',
            'product_description' => 'required|string|max:1000',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Fetch the store by ID
        $store = Stores::findOrFail($id);

        // Handle the image upload
        if ($request->hasFile('product_image')) {
            // Delete the old image if it exists
            if ($store->product_image && Storage::exists('public/images/' . $store->product_image)) {
                Storage::delete('public/images/' . $store->product_image);
            }

            // Store the new image
            $imagePath = $request->file('product_image')->store('images', 'public');
            $validated['product_image'] = $imagePath;
        }

        // Update the store's attributes
        $store->update($validated);

        // Redirect to a success page or back to the view page
        return redirect()->route('stores.dashboard', $id)->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $store = Stores::findOrFail($id);
    $store->delete();

    return redirect()->route('stores.dashboard')->with('success', 'Product deleted successfully!');
}
}
