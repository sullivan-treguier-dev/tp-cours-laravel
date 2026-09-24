@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto mt-4 p-3 border rounded-3 bg-white shadow">
        <h1>Absence n°{{ $absence->id }} :</h1>
        <p>De {{ $absence->user->nom . ' ' . $absence->user->prenom }}</p>
        <p>Début de l'absence : {{ $absence->date_debut }} / Fin de l'absence : {{ $absence->date_fin }}</p>
        <p>Motif de l'absence : {{ $absence->motif }}</p>
    </div>
@endsection
