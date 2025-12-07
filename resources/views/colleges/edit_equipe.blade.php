@extends('layouts.default')

@section('title', 'Modifier une équipe')

@section('content')
<article class="container">

    <header>
        <h2>Modifier l'équipe : {{ $equipe->nom }}</h2>
    </header>

    <form method="POST" action="{{ route('equipes.update', $equipe) }}">
        @csrf
        @method('PUT')

        <label>
            Nom
            <input type="text" name="nom" value="{{ old('nom', $equipe->nom) }}" required>
        </label>

        <label>
            Code
            <input type="text" name="code" value="{{ old('code', $equipe->code) }}" required>
        </label>

        <label>
            Site
            <input type="text" name="site" value="{{ old('site', $equipe->site) }}">
        </label>

        <label>
            Commentaire
            <textarea name="commentaire">{{ old('commentaire', $equipe->commentaire) }}</textarea>
        </label>

        {{-- Sélection du collège --}}
        <label>
            Collège
            <select name="id_college" required>
                @foreach($colleges as $college)
                    <option value="{{ $college->id }}"
                        @selected($equipe->id_college == $college->id)>
                        {{ $college->nom }}
                    </option>
                @endforeach
            </select>
        </label>

        {{-- Sélection des membres --}}
        <label>
            Membres de l'équipe (4 max)
            <select name="membres[]" multiple size="6">
                
                {{-- Membres déjà dans l'équipe --}}
                @foreach($equipe->membres as $m)
                    <option value="{{ $m->id }}" selected>
                        {{ $m->prenom }} {{ $m->nom }} — {{ $m->classe }}
                    </option>
                @endforeach

                {{-- Membres libres --}}
                @foreach($utilisateursLibres as $u)
                    <option value="{{ $u->id }}">
                        {{ $u->prenom }} {{ $u->nom }} — {{ $u->classe }}
                    </option>
                @endforeach
            </select>

            <small>Sélectionne jusqu'à 4 élèves (CTRL+clic)</small>
        </label>

        <button class="contrast" type="submit">Mettre à jour</button>
        <a href="{{ route('equipes.index') }}" class="button">Annuler</a>
    </form>

</article>
@endsection
