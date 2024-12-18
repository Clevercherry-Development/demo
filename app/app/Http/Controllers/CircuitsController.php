<?php

namespace App\Http\Controllers;

use App\Models\Circuits;

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
}
