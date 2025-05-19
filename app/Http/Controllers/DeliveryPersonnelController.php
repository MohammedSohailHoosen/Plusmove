<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPersonnel;
use Illuminate\Http\Request;

class DeliveryPersonnelController extends Controller
{
    // Display a listing of the delivery personnel
    public function index()
    {
        return response()->json(DeliveryPersonnel::all(), 200);
    }

    // Store a newly created delivery personnel in storage
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:delivery_personnels',
            'phone' => 'required|string|max:20',
            'city'  => 'required|string|max:100',
        ]);

        $personnel = DeliveryPersonnel::create($request->all());

        return response()->json($personnel, 201);
    }

    // Display the specified delivery personnel
    public function show($id)
    {
        $personnel = DeliveryPersonnel::find($id);

        if (!$personnel) {
            return response()->json(['message' => 'Delivery personnel not found'], 404);
        }

        return response()->json($personnel, 200);
    }

    // Update the specified delivery personnel
    public function update(Request $request, $id)
    {
        $personnel = DeliveryPersonnel::find($id);

        if (!$personnel) {
            return response()->json(['message' => 'Delivery personnel not found'], 404);
        }

        $request->validate([
            'name'  => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:delivery_personnels,email,' . $id,
            'phone' => 'sometimes|required|string|max:20',
            'city'  => 'sometimes|required|string|max:100',
            'is_active' => 'boolean',
        ]);

        $personnel->update($request->all());

        return response()->json($personnel, 200);
    }

    // Remove the specified delivery personnel from storage
    public function destroy($id)
    {
        $personnel = DeliveryPersonnel::find($id);

        if (!$personnel) {
            return response()->json(['message' => 'Delivery personnel not found'], 404);
        }

        $personnel->delete();

        return response()->json(['message' => 'Delivery personnel deleted'], 200);
    }
}
