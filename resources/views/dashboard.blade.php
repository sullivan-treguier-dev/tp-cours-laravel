@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <h1>Tableau de bord</h1>
        <p>Vous êtes connecté(e) sur le Suivi ! Bienvenue {{ auth()->user()->prenom }} !</p>
        <div class="d-flex justify-content-center gap-4">
            <div>
                <div class="text-center text-white border border-black rounded-top-3 bg-info display-1 p-2">
                    <i class="bi bi-folder-fill"></i>
                </div>
                <div class="border border-black rounded-bottom-3 fw-bold p-2">
                    Nombre d'absences : {{ $nbAbsence }}
                </div>
            </div>
            <div>
                <div class="text-center text-white border border-black rounded-top-3 bg-primary display-1 p-2">
                    <i class="bi bi-person-vcard-fill"></i>
                </div>
                <div class="border border-black rounded-bottom-3 fw-bold p-2">
                    Nombre de salariés : {{ $nbSalarie }}
                </div>
            </div>
        </div>
    </div>
@endsection
