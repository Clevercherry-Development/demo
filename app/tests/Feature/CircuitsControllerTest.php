<?php

namespace Tests\Feature;

use App\Models\Circuits;
use Tests\TestCase;

class CircuitsControllerTest extends TestCase
{
    public function test_list_circuits_returns_a_view_with_active_circuits() // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    {
        // Create some active and inactive circuits
        Circuits::create(['name' => 'Active Circuit 1', 'description' => 'Description 1', 'laps' => 44, 'distance' => 7.004, 'location' => 'Location 1', 'active' => true]);
        Circuits::create(['name' => 'Active Circuit 2', 'description' => 'Description 2', 'laps' => 52, 'distance' => 5.891, 'location' => 'Location 2', 'active' => true]);
        Circuits::create(['name' => 'Inactive Circuit', 'description' => 'Description 3', 'laps' => 56, 'distance' => 5.513, 'location' => 'Location 3', 'active' => false]);

        $response = $this->get('/circuits');

        $response->assertStatus(200);
        $response->assertViewIs('circuits.list');
        $response->assertViewHas('circuits');

        $circuits = $response->viewData('circuits');
        $this->assertCount(2, $circuits); // Only active circuits should be returned

        $this->assertEquals('Active Circuit 1', $circuits[0]->name);
        $this->assertEquals('Active Circuit 2', $circuits[1]->name);
    }


    public function test_info_circuit_returns_a_view_with_circuit_details() // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    {
        $circuit = Circuits::create(['name' => 'Test Circuit', 'description' => 'Test Description', 'laps' => 44, 'distance' => 7.004, 'location' => 'Test Location', 'active' => true]);

        $response = $this->get('/circuits/' . $circuit->id);

        $response->assertStatus(200);
        $response->assertViewIs('circuits.info');
        $response->assertViewHas('circuit'); // Ensure the view receives the 'circuit' variable

        $responseCircuit = $response->viewData('circuit');
        $this->assertNotNull($responseCircuit); // Check that a circuit was actually found
        $this->assertEquals('Test Circuit', $responseCircuit->name);
        $this->assertEquals('Test Description', $responseCircuit->description);
    }

    public function test_info_circuit_returns_404_if_circuit_not_found() // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    {
        $response = $this->get('/circuits/non_existent_id');
        $response->assertStatus(404);  // Or assertNotFound() for a more specific exception check
    }

    public function test_list_circuits_handles_empty_database() // phpcs:ignore PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    {
        // Explicitly delete all circuits to simulate an empty database for this test.
        Circuits::truncate(); //  <-- crucial for MongoDB!

        $response = $this->get('/circuits');

        $response->assertStatus(200);
        $response->assertViewIs('circuits.list');
        $response->assertViewHas('circuits');

        $circuits = $response->viewData('circuits');
        $this->assertCount(0, $circuits);
    }
}
