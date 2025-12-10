<?php
namespace App\Http\Controllers;
use App\Models\McdUtilisateur as Utilisateur;
use App\Models\Equipe;
use App\Models\College;
use Illuminate\Http\Request;
class EquipeController extends Controller
{
public function index(Request $request)
{
    $query = Equipe::with(['college', 'membres']);

    // Recherche par nom
    if ($request->filled('q')) {
        $query->where('nom', 'LIKE', "%{$request->q}%");
    }

    // Filtre par collège
    if ($request->filled('college_id')) {
        $query->where('college_id', $request->college_id);
    }

    // Filtre par nombre de membres
    if ($request->filled('membres')) {
        $query->whereHas('membres', function ($q) use ($request) {
            $q->havingRaw('COUNT(*) = ?', [$request->membres]);
        });
    }

    $equipes = $query->get();

    // Pour remplir la liste des collèges dans le filtre
    $colleges = College::all();

    return view('colleges.equipe', compact('equipes', 'colleges'));
}



    public function create()
    {
        $colleges = College::all();
        $utilisateurs = Utilisateur::whereNull('id_equipe')->get(); // dispo pour ajouter
        return view('colleges.create_equipe', compact('colleges', 'utilisateurs'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'id_college' => 'required|exists:colleges,id',
        'membres' => 'array|max:4',
    ]);

    // Création de l'équipe SANS code
    $equipe = Equipe::create([
        'nom' => $request->nom,
        'id_college' => $request->id_college,
        'site' => $request->site,
        'commentaire' => $request->commentaire,
    ]);

    // Récupération du collège
    $college = College::find($request->id_college);

    // Count équipes du collège
    $numEquipe = Equipe::where('id_college', $college->id)->count();

    // Génération du code : CODECOLLEGE + numéro 3 chiffres
    $equipe->code = $college->code . str_pad($numEquipe, 3, '0', STR_PAD_LEFT);
    $equipe->save();

    // Ajout des membres
    if ($request->membres) {
        Utilisateur::whereIn('id', $request->membres)
            ->update(['id_equipe' => $equipe->id]);
    }

    return redirect()->route('equipes.index')->with('success', 'Équipe créée.');
}



    public function show(Equipe $equipe)
    {
        $equipe->load('college','membres');
        return view('colleges.show_equipe', compact('equipe'));
    }

public function edit(Equipe $equipe)
{
    $equipe->load('membres');

    $colleges = College::all();

    $utilisateursLibres = Utilisateur::whereNull('id_equipe')->get();

    return view('colleges.edit_equipe', compact('equipe', 'colleges', 'utilisateursLibres'));
}


   public function update(Request $request, Equipe $equipe)
{
    // Si le collège change -> regénérer un numéro
    if ($request->id_college != $equipe->id_college) {

        $college = College::find($request->id_college);

        // Nouveau numéro dans le nouveau collège
        $numEquipe = Equipe::where('id_college', $college->id)->count() + 1;

        $equipe->code = $college->code . str_pad($numEquipe, 3, '0', STR_PAD_LEFT);
    }

    $equipe->nom = $request->nom;
    $equipe->site = $request->site;
    $equipe->commentaire = $request->commentaire;
    $equipe->id_college = $request->id_college;
    $equipe->save();

    // Gestion des membres (version hasMany)
    Utilisateur::where('id_equipe', $equipe->id)->update(['id_equipe' => null]);
    if ($request->membres) {
        Utilisateur::whereIn('id', $request->membres)->update(['id_equipe' => $equipe->id]);
    }

    return redirect()->route('equipes.index')->with('success', 'Équipe mise à jour.');
}



    public function destroy(Equipe $equipe)
    {
        Utilisateur::where('id_equipe', $equipe->id)->update(['id_equipe' => null]);
        $equipe->delete();
        return redirect()->route('colleges.equipe');
    }
}
