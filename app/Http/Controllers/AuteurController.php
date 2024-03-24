<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auteurs = Auteur::all()->toArray();
        return array_reverse($auteurs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $auteur = new Auteur([
            'nomauteur' => $request->input('nomauteur'),
            'email' => $request->input('email'),
            'numtel' => $request->input('numtel')
        ]);
        $auteur->save();
        return response()->json('Auteur créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $auteur = Auteur::find($id);
        return response()->json($auteur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {

        $auteur = Auteur::find($id);
        $auteur->update($request->all());
        return response()->json($auteur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $auteur = Auteur::find($id);
        $auteur->delete();
        return response()->json(['message' => 'Auteur deleted successfully']);
    }
}
