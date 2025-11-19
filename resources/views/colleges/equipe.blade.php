@extends('layouts.default')

@section('title', 'Liste des équipes')

@section('content')
<article class="container">

    <header>
        <h2>Liste des équipes</h2>
    </header>

    @if(session('success'))
        <div class="alert success">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="/colleges/equipe?view=create" class="button contrast">➕ Créer une équipe</a>
    </p>

    <table class="striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Code</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse($equipes as $equipe)
            <tr>
                <td>{{ $equipe->nom }}</td>
                <td>{{ $equipe->code }}</td>
                <td>
                    <a class="button small" href="/colleges/equipe?view=show&id={{ $equipe->id }}">Voir</a>
                    <a class="button small" href="/colleges/equipe?view=edit&id={{ $equipe->id }}">Modifier</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" style="text-align:center;">Aucune équipe enregistrée.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</article>
@endsection
