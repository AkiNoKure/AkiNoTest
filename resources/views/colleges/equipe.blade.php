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
        <a href="{{ route('equipes.create') }}" class="button contrast">➕ Créer une équipe</a>
    </p>

    <table class="striped">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Code</th>
                <th>Collège</th>
                <th>Membres</th>
                <th style="width: 220px;">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse($equipes as $equipe)
            <tr>
                <td>{{ $equipe->nom }}</td>
                <td>{{ $equipe->code }}</td>
                <td>{{ $equipe->college->nom }}</td>
                <td>{{ $equipe->membres->count() }}/4</td>

                <td>
                    <a class="button small" 
                       href="{{ route('equipes.show', $equipe) }}">
                        Voir
                    </a>

                    <a class="button small" 
                       href="{{ route('equipes.edit', $equipe) }}">
                        Modifier
                    </a>

                    <form action="{{ route('equipes.destroy', $equipe) }}" 
                          method="POST" 
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button class="button small" 
                                onclick="return confirm('Supprimer cette équipe ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align:center;">Aucune équipe enregistrée.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

</article>
@endsection
