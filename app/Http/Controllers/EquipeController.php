<?php

namespace App\Http\Controllers;

use App\Models\McdUtilisateur as Utilisateur;
use App\Models\Equipe;
use App\Models\College;
use App\Models\Concours;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index(Request $request)
    {
        $query = Equipe::with(['college', 'membres']);

        if ($request->filled('q')) {
            $query->where('nom', 'LIKE', "%{$request->q}%");
        }

        if ($request->filled('college_id')) {
            $query->where('college_id', $request->college_id);
        }

        if ($request->filled('membres')) {
            $query->withCount('membres')
                ->having('membres_count', $request->membres);
        }


        $equipes = $query->get();

        $colleges = College::all();

        return view('colleges.equipe', compact('equipes', 'colleges'));
    }



    public function create()
    {

        $colleges = College::all();
        $utilisateurs = Utilisateur::whereNull('id_equipe')->get();
        $concours = Concours::all();
        return view('colleges.create_equipe', compact('colleges', 'utilisateurs', 'concours'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'id_college' => 'required|exists:colleges,id',
            'site' => 'nullable|string|max:255',
            'commentaire' => 'nullable|string',
            'membres' => 'array|max:4',
            'id_concours' => 'required|exists:concours,id',

        ]);

        // Récupération du collège
        $college = College::findOrFail($request->id_college);

        // Count équipes du collège + 1
        $numEquipe = Equipe::where('id_college', $college->id)->count() + 1;

        // Génération du code : CODECOLLEGE + numéro 3 chiffres
        $codeEquipe = $college->code . str_pad($numEquipe, 3, '0', STR_PAD_LEFT);

        // Création de l'équipe avec le code généré
        $equipe = Equipe::create([
            'nom' => $request->nom,
            'id_college' => $request->id_college,
            'site' => $request->site,
            'commentaire' => $request->commentaire,
            'code' => $codeEquipe,
            'id_concours' => $request->id_concours, // <--- IMPORTANT
        ]);

        // Ajout des membres
        if ($request->membres) {
            Utilisateur::whereIn('id', $request->membres)
                ->update(['id_equipe' => $equipe->id]);
        }

        return redirect()->route('equipes.index')->with('success', 'Équipe créée.');
    }



    public function show(Equipe $equipe)
    {
        $equipe->load('college', 'membres');
        return view('colleges.show_equipe', compact('equipe'));
    }

    public function edit(Equipe $equipe)
    {
        $equipe->load('membres');

        $colleges = College::all();
        $concours = Concours::all(); // On récupère tous les concours pour le select
        $utilisateursLibres = Utilisateur::whereNull('id_equipe')->orWhere('id_equipe', $equipe->id)->get();

        return view('colleges.edit_equipe', compact('equipe', 'colleges', 'concours', 'utilisateursLibres'));
    }

    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'id_college' => 'required|exists:colleges,id',
            'site' => 'nullable|string|max:255',
            'commentaire' => 'nullable|string',
            'membres' => 'array|max:4',
            'id_concours' => 'required|exists:concours,id',
        ]);

        // Si le collège change -> regénérer le code
        if ($request->id_college != $equipe->id_college) {
            $college = College::find($request->id_college);
            $numEquipe = Equipe::where('id_college', $college->id)->count() + 1;
            $equipe->code = $college->code . str_pad($numEquipe, 3, '0', STR_PAD_LEFT);
        }

        $equipe->nom = $request->nom;
        $equipe->site = $request->site;
        $equipe->commentaire = $request->commentaire;
        $equipe->id_college = $request->id_college;
        $equipe->id_concours = $request->id_concours; // Mise à jour du concours
        $equipe->save();

        // Gestion des membres
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
