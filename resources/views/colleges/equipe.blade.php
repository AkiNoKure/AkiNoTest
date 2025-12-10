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
<form method="GET" action="{{ route('equipes.index') }}" class="grid gap-2">

    <!-- Recherche par nom -->
    <input type="text" name="q" placeholder="Rechercher par nom..." 
           value="{{ request('q') }}" />

    <!-- Filtre par collège -->
    <select name="college_id">
        <option value="">Tous les collèges</option>
        @foreach($colleges as $college)
            <option value="{{ $college->id }}" 
                {{ request('college_id') == $college->id ? 'selected' : '' }}>
                {{ $college->nom }}
            </option>
        @endforeach
    </select>

    <!-- Filtre par nombre de membres -->
    <select name="membres">
        <option value="">Tous</option>
        <option value="1" {{ request('membres') == 1 ? 'selected' : '' }}>1 membre</option>
        <option value="2" {{ request('membres') == 2 ? 'selected' : '' }}>2 membres</option>
        <option value="3" {{ request('membres') == 3 ? 'selected' : '' }}>3 membres</option>
        <option value="4" {{ request('membres') == 4 ? 'selected' : '' }}>4 membres</option>
    </select>

    <button class="button primary">Filtrer</button>
</form>

<br>


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
