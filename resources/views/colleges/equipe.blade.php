@extends('layouts.default')

@section('contenu')
<h2>Liste des équipes</h2>

<a href="{{ route('equipes.create') }}">Créer une équipe</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<ul>
@foreach($equipes as $equipe)
    <li>
        {{ $equipe->nom }} (code: {{ $equipe->code }})

        <a href="{{ route('equipes.show', $equipe) }}">Voir</a>
        <a href="{{ route('equipes.edit', $equipe) }}">Modifier</a>

        <form action="{{ route('equipes.destroy', $equipe) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Supprimer</button>
        </form>
    </li>
@endforeach
</ul>
@endsection
