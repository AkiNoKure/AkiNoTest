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
        <li><strong>Site :</strong> {{ $equipe->site ?? '—' }}</li>
        <li><strong>Commentaire :</strong> {{ $equipe->commentaire ?? '—' }}</li>
        <li><strong>Collège :</strong> {{ $equipe->college->nom }}</li>
    </ul>

    <h3>Membres ({{ $equipe->membres->count() }}/4)</h3>

    @if($equipe->membres->isEmpty())
        <p><em>Aucun membre dans cette équipe.</em></p>
    @else
        <ul>
            @foreach($equipe->membres as $membre)
                <li>
                    {{ $membre->prenom }} {{ $membre->nom }}
                    ({{ $membre->classe ?? 'classe inconnue' }})
                </li>
            @endforeach
        </ul>
    @endif

    <p>
        <a href="{{ route('equipes.index') }}" class="button">⬅ Retour</a>

        <a class="button contrast"
           href="{{ route('equipes.edit', $equipe) }}">
            Modifier
        </a>
    </p>

</article>
@endsection
