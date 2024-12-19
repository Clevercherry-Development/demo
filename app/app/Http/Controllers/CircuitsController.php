<?php

namespace App\Http\Controllers;

use App\Models\Circuits;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    public function getValidationRules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'laps' => 'required|integer',
            'distance' => 'required|numeric',
            'location' => 'required|string|max:255',
            'active' => 'required|boolean',
        ];
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
        try {
            $validatedData = $request->validate($this->getValidationRules());
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage(), 422);
        }

        $circuit = Circuits::create($validatedData);

        return response()->json($circuit, 201);
    }

    public function apiUpdate(string $id, Request $request)
    {
        try {
            $validatedData = $request->validate($this->getValidationRules());
        } catch (ValidationException $exception) {
            return response()->json($exception->getMessage(), 422);
        }

        $circuit = Circuits::where('id', $id)->first();

        if (!$circuit) {
            return response()->json(['message' => 'Circuit not found'], 404);
        }

        $circuit->update($validatedData);

        return response()->json($circuit, 201);
    }

    public function apiDelete(string $id)
    {
        $circuit = Circuits::where('id', $id)->first();

        if (!$circuit) {
            return response()->json(['message' => 'Circuit not found'], 404);
        }

        $circuit->delete();

        return response()->json(['message' => 'Circuit deleted'], 200);
    }
}
