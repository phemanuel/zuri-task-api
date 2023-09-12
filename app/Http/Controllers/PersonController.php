<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // Define the number of persons per page 
            $perPage = 5;

            // Get paginated results
            $persons = Person::paginate($perPage);
        // Check if the table is empty
            if ($persons->isEmpty()) {
                return response()->json([
                    'message' => 'No names in the database',
                    'status' => 404
                ]);
            }

            // Extract the items from the pagination object
            $data = $persons->items();

            // Create an array to hold the paginated data and links
            $response = [
                'data' => $data,
                'pagination' => [
                    'current_page' => $persons->currentPage(),
                    'last_page' => $persons->lastPage(),
                    'total' => $persons->total(),
                    'per_page' => $perPage,
                    'prev_page_url' => $persons->previousPageUrl(),
                    'next_page_url' => $persons->nextPageUrl(),
                ],
                'status' => 200
            ];

            return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
        ]);
    
        Person::create($data);
        return response()->json([
            'name' => $request->name,
            'message' => 'Person created successfully',
            'status' => 200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // Validate that the 'name' parameter is required and a string
        $request->validate([
            'name' => 'required|string',
        ]);
        // Get the 'name' query parameter from the request
        $name = trim($request->input('name'));        
        // Query the database to find a person by name
        $person = Person::where('name', $name)->first();

        if (!$person) {
            return response()->json([
                'message' => 'Person not found',
                'status' => 404,
            ]);
        }

        return response()->json([
            'name' => $person,
            'status' => 200,
        ]);

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
    public function update(Request $request)
    {
        // Validate that the 'name' parameter is required and a string
        $request->validate([
            'name' => 'required|string',
        ]);

        // Get the 'name' query parameter from the request
        $name = trim($request->input('name'));

        // Query the database to find a person by name
        $person = Person::where('name', $name)->first();

        if (!$person) {
            return response()->json([
                'message' => 'Person not found',
                'status' => 404,
            ]);
        }

        // Validate and update the person's information
        $data = $request->validate([
            'new_name' => 'required|string', 
        ]);

        $person->update(['name' => $data['new_name']]);

        return response()->json([
            'name' => $person->fresh(), 
            'message' => 'Person updated successfully',
            'status' => 200,
        ]);
    }  

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Validate that the 'name' parameter is required and a string
        $request->validate([
            'name' => 'required|string',
        ]);
        // Get the 'name' query parameter from the request
        $name = trim($request->input('name'));
        $person = Person::where('name', $name)->first();

        if (!$person) {
            return response()->json([
                'message' => 'Person not found',
                'status'   => 404
            ]);
        }

        $person->delete();
        
        return response()->json([
            'name' => $person,
            'message' => 'Person deleted successfully',
            'status' => 200
        ]);
    }
}
