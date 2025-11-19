@extends('layouts.default')

@section('title', 'Créer une équipe')

@section('content')
<article class="container">

    <header>
        <h2>Créer une équipe</h2>
    </header>

    <form method="POST" action="/colleges/equipe/store">
        @csrf

        <label>
            Nom de l'équipe
            <input type="text" name="nom" required>
        </label>

        <label>
            Code
            <input type="text" name="code" required>
        </label>

        <label>
            Site
            <input type="text" name="site">
        </label>

        <label>
            Commentaire
            <textarea name="commentaire"></textarea>
        </label>

        <button type="submit" class="contrast">Créer</button>
        <a href="/colleges/equipe" class="button">Annuler</a>
    </form>

</article>
@endsection
