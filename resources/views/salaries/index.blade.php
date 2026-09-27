@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Liste des salaries</h1>
            <a href="{{ route('salarie.create') }}" class="btn btn-primary me-2">Ajouter un salarie</a>
        </div>
        @if(session('success'))
            <div class="border border-success border-3 rounded-3 text-success fw-bold bg-success bg-opacity-25 p-3">{{ session('success') }}</div>
        @endif
        <div class="d-grid rounded-3 bg-primary p-3 m-2 gap-3">
            @foreach ($salaries as $salarie)
                <div class="d-flex justify-content-between align-items-center border rounded-3 bg-white px-2">
                    <div class="d-block">
                        <h2>{{ $salarie->nom . ' ' . $salarie->prenom }}</h2>
                        <p>{{ $salarie->email }}</p>
                    </div>
                    <div class="d-flex flex-nowrap gap-1">
                        <a href="{{ route('salarie.edit', $salarie->id) }}" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                        <form action="{{ route('salarie.destroy', $salarie->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger form-control-supprimer-salarie"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
