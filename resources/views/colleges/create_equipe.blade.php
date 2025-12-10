@extends('layouts.default')

@section('title', 'Créer une équipe')

@section('content')
<article class="container">

    <header>
        <h2>Créer une équipe</h2>
    </header>

    <form method="POST" action="{{ route('equipes.store') }}">
        @csrf

        <label>
            Nom de l'équipe
            <input type="text" name="nom" value="{{ old('nom') }}" required>
        </label>
        <label for="id_concours">Concours</label>
        <select name="id_concours" id="id_concours" required>
            @foreach($concours as $concoursItem)
            <option value="{{ $concoursItem->id }}">{{ $concoursItem->nom }}</option>
            @endforeach
        </select>

        {{-- Code généré automatiquement -> affichage seulement --}}
        <label>
            Code (sera généré automatiquement)
            <input type="text" value="Généré automatiquement" disabled>
        </label>

        <label>
            Site
            <input type="text" name="site" value="{{ old('site') }}">
        </label>

        <label>
            Commentaire
            <textarea name="commentaire">{{ old('commentaire') }}</textarea>
        </label>

        {{-- Sélection du collège --}}
        <label>
            Collège
            <select name="id_college" required>
                <option value="">-- Sélectionner un collège --</option>
                @foreach($colleges as $college)
                <option value="{{ $college->id }}">{{ $college->nom }}</option>
                @endforeach
            </select>
        </label>

        {{-- Sélection des membres --}}
        <label>
            Membres de l'équipe (4 max)
            <select name="membres[]" multiple size="5">
                @foreach($utilisateurs as $u)
                <option value="{{ $u->id }}">
                    {{ $u->prenom }} {{ $u->nom }} — {{ $u->classe }}
                </option>
                @endforeach
            </select>

            <small>Sélectionne jusqu'à 4 élèves (CTRL+clic ou clic long)</small>
        </label>

        <button type="submit" class="contrast">Créer</button>
        <a href="{{ route('equipes.index') }}" class="button">Annuler</a>
    </form>

</article>
@endsection