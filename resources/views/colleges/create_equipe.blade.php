@extends('layouts.default')

@section('contenu')
<h2>Créer une équipe</h2>

<form action="{{ route('equipes.store') }}" method="POST">
    @csrf

    <label>Code :</label>
    <input type="text" name="code" required>

    <label>Nom :</label>
    <input type="text" name="nom" required>

    <label>Site :</label>
    <input type="text" name="site">

    <button type="submit">Enregistrer</button>
</form>
@endsection
