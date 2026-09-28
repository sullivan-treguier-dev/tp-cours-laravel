@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <h1>Absence n°{{ $absence->id }} :</h1>
        <p>{{ __('To') . ' ' . $absence->user->nom . ' ' . $absence->user->prenom }}</p>
        <p>{{ __('Start of Absence') }} : {{ $absence->date_debut }} / {{ __('End of Absence') }} : {{ $absence->date_fin }}</p>
        <p>{{ __('Reason of Absence') }} : {{ $absence->motif }}</p>
    </div>
@endsection
