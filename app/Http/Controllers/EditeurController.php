<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use Illuminate\Http\Request;

class EditeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $editeurs = Editeur::all()->toArray();
        return array_reverse($editeurs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $editeur = new Editeur([
            'maisonedit' => $request->input('maisonedit'),
            'siteweb' => $request->input('siteweb'),
            'email' => $request->input('email')
        ]);
        $editeur->save();
        return response()->json('Editeur créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $editeur = Editeur::find($id);
        return response()->json($editeur);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $editeur = Editeur::find($id);
        $editeur->update($request->all());
        return response()->json($editeur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)

    {
        $editeur = Editeur::find($id);
        $editeur->delete();
        return response()->json(['message' => 'Editeur deleted successfully']);
    }
}
