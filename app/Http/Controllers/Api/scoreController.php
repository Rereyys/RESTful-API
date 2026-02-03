<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\scoreResource;
use App\Models\score;
use Illuminate\Support\Facades\Validator;

class scoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new scoreResource(true, 'Data retrieved successfully', score::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validator = Validator::make($request->all(), [
            '_id' => 'required|string|max:255',
            'Name' => 'required|string|max:255',
            'tugas' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric'
          ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }   
        $score = score::create([
            '_id' => $request->_id,
            'Name' => $request->Name,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas
        ]);
        return new scoreResource(true, 'Data created successfully', $score);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new scoreResource(true, 'Data found', score::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    
    $student = score::find($id);

    if (!$student) {
        return response()->json(['message' => 'Data tidak ditemukan!'], 404);
    }

    $validator = Validator::make($request->all(), [
        'Name'  => 'string|max:255',
        'tugas' => 'numeric',
        'uts'   => 'numeric',
        'uas'   => 'numeric'
    ]);

    
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    $student->update($request->all());
    return new scoreResource(true, 'Data updated successfully', $student);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = score::findOrFail($id);
        $student->delete();
        return new scoreResource(true, 'Data deleted successfully', $student);
    }
}
