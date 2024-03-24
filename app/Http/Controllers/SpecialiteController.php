<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialites = Specialite::all()->toArray();
        return array_reverse($specialites);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $specialite = new Specialite([
            'nomspecialite' => $request->input('nomspecialite')
        ]);
        $specialite->save();
        return response()->json('Specialite créée !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $specialite = Specialite::find($id);
        return response()->json($specialite);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $specialite = Specialite::find($id);
        $specialite->update($request->all());
        return response()->json($specialite);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $specialite = Specialite::find($id);
        $specialite->delete();
        return response()->json(['message' => 'Specialite deleted
successfully']);
    }
}
