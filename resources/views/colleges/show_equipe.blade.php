@extends('layouts.default')

@section('title', 'Détails équipe')

@section('content')
<article class="container">

    <header>
        <h2>Équipe : {{ $equipe->nom }}</h2>
    </header>

    <ul>
        <li><strong>Nom :</strong> {{ $equipe->nom }}</li>
        <li><strong>Code :</strong> {{ $equipe->code }}</li>
        <li><strong>Site :</strong> {{ $equipe->site }}</li>
        <li><strong>Commentaire :</strong> {{ $equipe->commentaire }}</li>
    </ul>

    <p>
        <a href="/colleges/equipe" class="button">⬅ Retour</a>
        <a class="button contrast" href="/colleges/equipe?view=edit&id={{ $equipe->id }}">Modifier</a>
    </p>

</article>
@endsection
