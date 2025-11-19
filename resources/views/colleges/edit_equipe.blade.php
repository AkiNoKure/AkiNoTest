@extends('layouts.default')

@section('contenu')
<h2>Modifier l'équipe</h2>

<form action="{{ route('equipes.update', $equipe) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Code :</label>
    <input type="text" name="code" value="{{ $equipe->code }}" required>

    <label>Nom :</label>
    <input type="text" name="nom" value="{{ $equipe->nom }}" required>

    <label>Site :</label>
    <input type="text" name="site" value="{{ $equipe->site }}">

    <button type="submit">Modifier</button>
</form>
@endsection
