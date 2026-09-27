@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <h1>Tableau de bord</h1>
        <p>Vous êtes connecté(e) sur le Suivi ! Bienvenue {{ auth()->user()->prenom }} !</p>
    </div>
@endsection
