@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <h1>{{ $absence === null ? 'Création' : 'Modification' }} de l'absence</h1>
        <form action="{{ $absence === null ? route('absence.store') : route('absence.update', $absence->id) }}" method="POST">
            @csrf
            @method($absence === null ? 'POST' : 'PUT')
            <div class="d-grid gap-2 rounded-3 bg-secondary p-3 m-2">
                <div class="d-flex">
                    <div class="form-floating col-6">
                        <input type="datetime" name="date_debut" id="date_debut" class="form-control" required value="{{ old('date_debut', $absence === null ? '' : $absence->date_debut) }}">
                        <label for="date_debut" class="required">Date du début de l'absence</label>
                        @error('date_debut')
                            <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating col-6">
                        <input type="datetime" name="date_fin" id="date_fin" class="form-control" required value="{{ old('date_fin', $absence === null ? '' : $absence->date_fin) }}">
                        <label for="date_fin" class="required">Date de la fin de l'absence</label>
                        @error('date_fin')
                            <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-floating">
                    <textarea name="motif" id="motif" class="form-control" required>{{ old('motif', $absence === null ? '' : $absence->motif) }}</textarea>
                    <label for="motif" class="required">Motif</label>
                </div>
                @error('motif')
                    <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                @enderror

                <div class="form-floating">
                    <select name="salarie_id" id="salarie" class="form-control select2">
                        <option></option>
                        @foreach ($salaries as $salarie)
                            <option value="{{ $salarie->id }}" {{ $absence !== null && $salarie->id === $absence->user_id ? 'selected' : ''}}>{{ $salarie->nom . ' ' . $salarie->prenom }}</option>
                        @endforeach
                    </select>
                    <label for="salarie_id" class="required">Salarié</label>
                    @error('salarie_id')
                        <div class="text-white fw-bold bg-danger shadow rounded-3 p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('absence.index') }}" class="btn btn-danger col-6 form-confirm-annuler">Annuler</a>
                <button type="submit" class="btn btn-success col-6">{{ $absence === null ? 'Créer' : 'Modifier'}}</button>
            </div>
        </form>
    </div>
@endsection
