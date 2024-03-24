<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $livres = Livre::with('editeur','specialite','auteurs')->get()->toArray();
    /*
    (&) pour modifier directement chaque élément du tableau "$livres".
    Cela permet d'accéder à la relation "auteurs" pour chaque livre à l'intérieur
    de la boucle foreach.
    */
    foreach ($livres as &$livre) {
    $auteurs = $livre['auteurs'];
    }
    return array_reverse($livres);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $livre = new Livre([
    'isbn' => $request->input('isbn'),
    'titre' => $request->input('titre'),
    'annedition' => $request->input('annedition'),
    'prix' => $request->input('prix'),
    'qtestock' => $request->input('qtestock'),
    'couverture' => $request->input('couverture'),
    'specialite_id' => $request->input('specialite_id'),
    'editeur_id' => $request->input('editeur_id')
    ]);
    $livre->save();
    // On ajoute les auteurs associés au livre en utilisant attach
    $auteurIds = $request->input('auteur_ids'); // On aura un champ "auteur_ids" dans le formulaire
    $livre->auteurs()->attach($auteurIds);
    return response()->json('Livre créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $livre= Livre::find($id);
    return response()->json($livre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
{
$livre = Livre::find($id);
$livre->update($request->all());
return response()->json($livre);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $livre = Livre::find($id);
    if (!$livre) {
    return response()->json(['message' => 'Livre not found'], 404);
    }
    // Supprimer l'enregistrement correspondant dans la table "livre_auteur"
     DB::table('livre_auteur')->where('livre_id', $livre->id)->delete();
    $livre->delete();
     return response()->json(['message' => 'Livre deleted successfully']);
}


}