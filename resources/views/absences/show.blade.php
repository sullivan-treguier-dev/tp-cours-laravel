@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Absence n°{{ $absence->id }} :</h1>
            <a href="{{ route('absence.index') }}" class="btn btn-dark"><i class="bi bi-arrow-bar-left"></i> {{ __('Back') }}</a>
        </div>
        <p>{{ __('To') . ' ' . $absence->user->nom . ' ' . $absence->user->prenom }}</p>
        <p>{{ __('Start of Absence') }} : {{ $absence->date_debut }} / {{ __('End of Absence') }} : {{ $absence->date_fin }}</p>
        <p>{{ __('Reason of Absence') }} : {{ $absence->motif }}</p>
    </div>
@endsection
