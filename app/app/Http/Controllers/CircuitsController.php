<?php

namespace App\Http\Controllers;

use App\Models\Circuits;
use Illuminate\Http\Request;

class CircuitsController extends Controller
{
    /**
     * List the circuits
     *
     * @return void
     */
    public function list()
    {
        $circuits = Circuits::where('active', true)->get();

        return view('circuits/list', [
            'circuits' => $circuits,
        ]);
    }

    /**
     * Show the circuit info
     *
     * @param string $id
     * @return void
     */
    public function info(string $id)
    {
        $circuit = Circuits::where('id', $id)->first();

        if (!$circuit) {
            abort(404);
        }

        return view('circuits/info', [
            'circuit' => $circuit
        ]);
    }

    public function apiList()
    {
        $circuits = Circuits::where('active', true)->get();
        return response()->json($circuits); // Return JSON response
    }

    public function apiInfo(string $id)
    {
        $circuit = Circuits::find($id);

        if (!$circuit) {
            return response()->json(['message' => 'Circuit not found'], 404); // 404 JSON response
        }

        return response()->json($circuit);
    }

    public function apiCreate(Request $request) // Add this method
    {
        // Validate the request data (important!)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'laps' => 'required|integer',
            'distance' => 'required|numeric',
            'location' => 'required|string|max:255',
            'active' => 'required|boolean',
        ]);

        return response()->json($validatedData, 201);

        // Create the new circuit
        $circuit = Circuits::create($validatedData);

        // Return the newly created circuit as a JSON response with a 201 status code
        return response()->json($circuit, 201);
    }
}
