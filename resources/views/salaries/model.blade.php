@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <h1>{{ $salarie === null ? 'Création' : 'Modification' }} du salarié</h1>
        <form action="{{ $salarie === null ? route('salarie.store') : route('salarie.update', $salarie->id) }}" method="POST">
            @csrf
            @method($salarie === null ? 'POST' : 'PUT')
            <div class="d-grid gap-2 rounded-3 bg-secondary p-3 m-2">
                <div class="d-flex">
                    <div class="form-floating col-6">
                        <input type="text" name="nom" id="nom" class="form-control" required value="{{ old('nom', $salarie === null ? '' : $salarie->nom) }}">
                        <label for="nom" class="required">Nom</label>
                        @error('nom')
                            <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating col-6">
                        <input type="text" name="prenom" id="prenom" class="form-control" required value="{{ old('prenom', $salarie === null ? '' : $salarie->prenom) }}">
                        <label for="prenom" class="required">Prénom</label>
                        @error('prenom')
                            <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email', $salarie === null ? '' : $salarie->email) }}">
                    <label for="email" class="required">Mail</label>
                </div>
                @error('email')
                    <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                @enderror

                <div class="form-floating">
                    <input type="password" name="password" id="password" class="form-control" {{ $salarie === null ? 'required' : ''}} value="{{ old('password') }}">
                    <label for="password" class="{{ $salarie === null ? 'required' : ''}}">Mot de passe</label>
                    @error('password')
                        <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('salarie.index') }}" class="btn btn-danger col-6 form-confirm-annuler">Annuler</a>
                <button type="submit" class="btn btn-success col-6">{{ $salarie === null ? 'Créer' : 'Modifier'}}</button>
            </div>
        </form>
    </div>
@endsection
