@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto my-4 p-3 border rounded-3 bg-white shadow">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-center">{{ __('Role') . ' ' . $role->title }}</h1>
            <a href="{{ route('role.index') }}" class="btn btn-dark"><i class="bi bi-arrow-bar-left"></i> {{ __('Back') }}</a>
        </div>

        @if(session('success'))
            <div class="border border-success border-3 rounded-3 text-success fw-bold bg-success bg-opacity-25 p-3">{{ session('success') }}</div>
        @endif
        <div class="d-grid rounded-3 bg-secondary p-3 m-2 gap-3">
            @if($role->abilities->count() <= 0)
                <div class="d-flex justify-content-between align-items-center border rounded-3 bg-white p-2">
                    {{ __('There is no ability in this role') }}
                </div>
            @else
                @foreach ($role->abilities as $ability)
                    <div class="d-flex justify-content-between align-items-center border rounded-3 bg-white px-2">
                        <div class="d-block">
                            <h2>{{ $ability->title }}</h2>
                        </div>
                        <div class="d-flex flex-nowrap gap-1">
                            @can('salarie-delete')
                                <form action="{{ route('role.disattach', ['role' => $role->id, 'ability' => $ability->id]) }}" method="post" class="form-confirm-retirer-ability" data-ability="{{ $ability->title }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
