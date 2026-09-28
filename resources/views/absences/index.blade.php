@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <div class="d-flex justify-content-between align-items-center">
            <h1>{{ __('List of absences') }}</h1>
            <a href="{{ route('absence.create') }}" class="btn btn-primary me-2">{{ __('Add absence') }}</a>
        </div>
        @if(session('success'))
            <div class="border border-success border-3 rounded-3 text-success fw-bold bg-success bg-opacity-25 p-3">{{ session('success') }}</div>
        @endif
        <div class="d-grid rounded-3 bg-primary p-3 m-2 gap-3">
            @foreach ($absences as $absence)
                <div class="d-flex justify-content-between align-items-center border rounded-3 bg-white px-2">
                    <div class="d-block">
                        <h2>Absence n°{{ $absence->id }}</h2>
                        <p>{{ __("To") . ' ' . $absence->user->nom . ' ' . $absence->user->prenom }}</p>
                    </div>
                    <div class="d-flex flex-nowrap gap-1">
                        <a href="{{ route('absence.show', $absence->id) }}" class="btn btn-dark"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('absence.edit', $absence->id) }}" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                        <form action="{{ route('absence.destroy', $absence->id) }}" method="post" class="form-confirm-supprimer-absence">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
