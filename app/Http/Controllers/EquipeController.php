<?php

class EquipeController extends Controller
{
    public function index()
    {
        $equipes = Equipe::with('college', 'membres')->get();
        return view('equipes.index', compact('equipes'));
    }

    public function create()
    {
        $colleges = College::all();
        $utilisateurs = Utilisateur::whereNull('id_equipe')->get(); // dispo pour ajouter
        return view('equipes.create', compact('colleges', 'utilisateurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'code' => 'required',
            'id_college' => 'required',
            'membres' => 'array|max:4'
        ]);

        $equipe = Equipe::create($request->only([
            'nom', 'code', 'site', 'commentaire', 'id_concours', 'id_college'
        ]));

        // assigner les membres
        Utilisateur::whereIn('id', $request->membres)
            ->update(['id_equipe' => $equipe->id]);

        return redirect()->route('equipes.index');
    }

    public function show(Equipe $equipe)
    {
        $equipe->load('college','membres');
        return view('equipes.show', compact('equipe'));
    }

    public function edit(Equipe $equipe)
    {
        $colleges = College::all();
        $utilisateursLibres = Utilisateur::whereNull('id_equipe')->get();
        $equipe->load('membres');

        return view('equipes.edit', compact('equipe', 'colleges', 'utilisateursLibres'));
    }

    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            'nom' => 'required',
            'code' => 'required',
            'id_college' => 'required',
            'membres' => 'array|max:4'
        ]);

        $equipe->update($request->only([
            'nom', 'code', 'site', 'commentaire', 'id_concours', 'id_college'
        ]));

        // retire les anciens
        Utilisateur::where('id_equipe', $equipe->id)->update(['id_equipe' => null]);

        // ajoute les nouveaux
        Utilisateur::whereIn('id', $request->membres)->update(['id_equipe' => $equipe->id]);

        return redirect()->route('equipes.show', $equipe);
    }

    public function destroy(Equipe $equipe)
    {
        Utilisateur::where('id_equipe', $equipe->id)->update(['id_equipe' => null]);
        $equipe->delete();
        return redirect()->route('equipes.index');
    }
}
