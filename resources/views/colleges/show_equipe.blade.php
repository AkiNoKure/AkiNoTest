@extends('layouts.default')

@section('contenu')
<h2>Détails de l'équipe</h2>

<p><strong>Code :</strong> {{ $equipe->code }}</p>
<p><strong>Nom :</strong> {{ $equipe->nom }}</p>
<p><strong>Site :</strong> {{ $equipe->site }}</p>

<a href="{{ route('equipes.index') }}">Retour</a>
@endsection
