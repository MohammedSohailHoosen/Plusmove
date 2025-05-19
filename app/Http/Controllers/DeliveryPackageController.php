<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPackage;
use Illuminate\Http\Request;

class DeliveryPackageController extends Controller
{
    /**
     * Display a listing of the delivery packages.
     */
    public function index()
    {
        $packages = DeliveryPackage::all();
        return response()->json($packages);
    }

    /**
     * Store a newly created delivery package in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sender_name' => 'required|string|max:255',
            'receiver_name' => 'required|string|max:255',
            'pickup_address' => 'required|string',
            'delivery_address' => 'required|string',
            'status' => 'required|string|in:pending,dispatched,delivered',
            'city' => 'required|string|max:255',
        ]);

        $package = DeliveryPackage::create($validated);

        return response()->json([
            'message' => 'Delivery package created successfully',
            'data' => $package
        ], 201);
    }

    /**
     * Display the specified delivery package.
     */
    public function show($id)
    {
        $package = DeliveryPackage::findOrFail($id);
        return response()->json($package);
    }

    /**
     * Update the specified delivery package in storage.
     */
    public function update(Request $request, $id)
    {
        $package = DeliveryPackage::findOrFail($id);

        $validated = $request->validate([
            'sender_name' => 'sometimes|string|max:255',
            'receiver_name' => 'sometimes|string|max:255',
            'pickup_address' => 'sometimes|string',
            'delivery_address' => 'sometimes|string',
            'status' => 'sometimes|string|in:pending,dispatched,delivered',
            'city' => 'sometimes|string|max:255',
        ]);

        $package->update($validated);

        return response()->json([
            'message' => 'Delivery package updated successfully',
            'data' => $package
        ]);
    }

    /**
     * Remove the specified delivery package from storage.
     */
    public function destroy($id)
    {
        $package = DeliveryPackage::findOrFail($id);
        $package->delete();

        return response()->json(['message' => 'Delivery package deleted successfully']);
    }

    public function assignPersonnel(Request $request, $id){
        
    $request->validate([
        'delivery_personnel_id' => 'nullable|exists:delivery_personnels,id',
    ]);

    $package = DeliveryPackage::findOrFail($id);
    $package->delivery_personnel_id = $request->delivery_personnel_id;
    $package->save();

    return response()->json([
        'message' => 'Delivery personnel assigned successfully',
        'package' => $package,
    ]);
}
}
