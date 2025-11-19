@extends('layouts.default')

@section('title', 'Modifier une équipe')

@section('content')
<article class="container">

    <header>
        <h2>Modifier l'équipe : {{ $equipe->nom }}</h2>
    </header>

    <form method="POST" action="/colleges/equipe/update">
        @csrf
        <input type="hidden" name="id" value="{{ $equipe->id }}">

        <label>
            Nom
            <input type="text" name="nom" value="{{ $equipe->nom }}" required>
        </label>

        <label>
            Code
            <input type="text" name="code" value="{{ $equipe->code }}" required>
        </label>

        <label>
            Site
            <input type="text" name="site" value="{{ $equipe->site }}">
        </label>

        <label>
            Commentaire
            <textarea name="commentaire">{{ $equipe->commentaire }}</textarea>
        </label>

        <button class="contrast" type="submit">Mettre à jour</button>
        <a href="/colleges/equipe" class="button">Annuler</a>
    </form>

</article>
@endsection
